<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FileModel;

use CodeIgniter\Files\File;

class Files extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->model = new FileModel();
    }

    public function index()
    {
        return view('files/index', ['data' => $this->model->findAll()]);
    }

    public function new()
    {
        return view('files/new');
    }

    public function create()
    {
        $fields = $this->request->getPost();

        $fileRules = [
            'arquivo' => [
            'label' => 'Documento',
            'rules' => 'uploaded[arquivo]'
                . '|ext_in[arquivo,pdf]'
                . '|max_size[arquivo,2048]', //2 Mb
            ],
        ];
        if (!$this->validate($fileRules)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('files/new', $data);
        }

        $arquivoUploaded = $this->request->getFile('arquivo');

        if (! $arquivoUploaded->hasMoved()) {
            $filepath = WRITEPATH . $arquivoUploaded->store('arquivo');
            $uploaded_fileinfo = new File($filepath);

            $fields['arquivo'] = $uploaded_fileinfo->getFileName();
            $fields['extensao'] = $uploaded_fileinfo->getExtension();
                        
            if($this->model->insert($fields))
                return redirect()->to('files');
            else{
                $data = ['errors' => $this->validator->getErrors()];
                return view('files/new', $data);
            }
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return view('files/new', $data);
        }
    }

    public function delete($id)
    {
        $upload = $this->model->find($id);
        if($upload){
            $basePath = WRITEPATH . 'uploads/arquivo/';
            unlink($basePath . $upload['arquivo']);
            $this->model->delete($id);
        }

        return redirect()->back();
    }

    public function download($id)
    {
        $file = $this->model->find($id);
        if(!$file)
            return redirect()->back();

        $filePath = WRITEPATH . 'uploads/arquivo/' . $file['arquivo'];
        if(file_exists($filePath))
            return $this->response->download($filePath, null)
                ->setFileName($file['nome'] . '.' . $file['extensao']);
        else
            return redirect()->back();
    }
}
