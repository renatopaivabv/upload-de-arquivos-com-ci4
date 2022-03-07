<?php
echo $this->extend('layout');

echo $this->section('content');

if(isset($errors)): foreach ($errors as $error): ?>
    <li><?= esc($error) ?></li>
<?php endforeach; endif; ?>

<div class="row my-3">
    <div class="col-md-6 mx-auto">

    <h2>Upload de arquivo</h2>

    <?= form_open_multipart('files') ?>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
        <input type="text" name="nome" class="form-control" aria-label="Nome" aria-describedby="Nome">
    </div>

    <div class="input-group mb-3">
        <input type="file" class="form-control" name="arquivo" id="arquivo">
        <label class="input-group-text" for="arquivo">Arquivo</label>
    </div>

    <input class="btn btn-primary" type="submit" value="Enviar" />

    </form>
    </div>
</div>

<?php echo $this->endSection() ;?>