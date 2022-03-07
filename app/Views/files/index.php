<?php
echo $this->extend('layout');

echo $this->section('content'); ?>

<h1 class="my-3">Listagem de arquivos</h1>

    <a class="btn btn-success float-end" href="<?=base_url() . '/files/new'?>"><i data-feather="plus-circle"></i></a>

<?php if($data): ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Extensao</th>
                <th>Baixar</th>
            </tr>
        </thead>
        <tbody>


<?php foreach($data as $d): ?>
    <tr>
        <td><?=$d['id']?></td>
        <td><?=$d['nome']?></td>
        <td><?=$d['extensao']?></td>
        <td>
            <a href="<?=base_url() . '/files/download/' . $d['id']; ?>"><i data-feather="download"></i></a>
            <a class="text-danger" href="<?=base_url() . '/files/delete/' . $d['id']; ?>"><i data-feather="trash-2"></i></a>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>


<?= $this->endSection()?>