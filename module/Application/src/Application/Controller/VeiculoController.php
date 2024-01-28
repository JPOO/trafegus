<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VeiculoController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = parent::indexAction();

        try {
            $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $veiculos = $em->getRepository('Application\Entity\Veiculo')->findAll();
            $viewModel->setVariable('veiculos', $veiculos);
        } catch (\Exception $e) {
            $viewModel->setVariable('alert', $e->getMessage());
        }

        return $viewModel;
    }

    public function saveAction()
    {
        $viewModel = new ViewModel();

        $id = $this->params()->fromRoute('id', null);

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        if (isset($id)) {
            $veiculo = $em->find('Application\Entity\Veiculo', $id);
            $viewModel->setVariable('veiculo', $veiculo);
            $title = 'Editar';
        } else {
            $title = 'Adicionar';
        }

        $viewModel->setVariable('title', $title);

        $request = $this->getRequest();

        if ($request->isPost()) {

            try {
                if (!isset($id)) {
                    $veiculo = new \Application\Entity\Veiculo();
                }

                $veiculo->setPlaca($request->getPost('placa'));
                $veiculo->setRenavam($request->getPost('renavam'));
                $veiculo->setModelo($request->getPost('modelo'));
                $veiculo->setMarca($request->getPost('marca'));
                $veiculo->setAno($request->getPost('ano'));
                $veiculo->setCor($request->getPost('cor'));

                if (isset($id)) {
                    $em->merge($veiculo);
                } else {
                    $em->persist($veiculo);
                }

                $em->flush();

                return $this->redirect()->toRoute('veiculo', ['action' => 'index']);
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
        $veiculo = $em->find('Application\Entity\Veiculo', $id);

        $em->remove($veiculo);
        $em->flush();

        return $this->redirect()->toRoute('veiculo', ['action' => 'index']);
    }
}