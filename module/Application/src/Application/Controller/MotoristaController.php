<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MotoristaController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = parent::indexAction();

        try {
            $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

            $motoristas = $em->getRepository('Application\Entity\Motorista')->findAll();

            $viewModel->setVariable('motoristas', $motoristas);

            $veiculos = $em->getRepository('Application\Entity\Veiculo')->findAll();
            if (!$veiculos) {
                $viewModel->setVariable('alert', 'Você precisa cadastrar um veículo primeiro.');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());die();
            $viewModel->setVariable('alert', $e->getMessage());
        }

        return $viewModel;
    }

    public function saveAction()
    {
        $viewModel = new ViewModel();

        $id = $this->params()->fromRoute('id', null);

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $veiculos = $em->getRepository('Application\Entity\Veiculo')->findAll();
        $viewModel->setVariable('veiculos', $veiculos);

        if (isset($id)) {
            $motorista = $em->find('Application\Entity\Motorista', $id);
            $viewModel->setVariable('motorista', $motorista);
            $title = 'Editar';
        } else {
            $title = 'Adicionar';
        }

        $viewModel->setVariable('title', $title);

        $request = $this->getRequest();

        if ($request->isPost()) {

            try {
                if (!isset($id)) {
                    $motorista = new \Application\Entity\Motorista();
                }

                $veiculo = $em->find('Application\Entity\Veiculo', $request->getPost('veiculo'));

                $motorista->setNome($request->getPost('nome'));
                $motorista->setRg($request->getPost('rg'));
                $motorista->setCpf($request->getPost('cpf'));
                $motorista->setTelefone($request->getPost('telefone'));
                $motorista->setVeiculo($veiculo);

                if (isset($id)) {
                    $em->merge($motorista);
                } else {
                    $em->persist($motorista);
                }

                $em->flush();

                return $this->redirect()->toRoute('motorista', ['action' => 'index']);
            } catch (\Exception $e) {
                $viewModel->setVariable('alert', $e->getMessage());
            }
        }

        return $viewModel;
    }

    public function removeAction()
    {
        $id = $this->params()->fromRoute('id', null);

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $veiculo = $em->find("Application\Entity\Motorista", $id);

        $em->remove($veiculo);
        $em->flush();

        return $this->redirect()->toRoute('motorista', ['action' => 'index']);
    }
}