<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
    <li>name: <?= esc($uploaded_fileinfo->getBasename()) ?></li>
    <li>size: <?= esc($uploaded_fileinfo->getSizeByUnit('mb')) ?> mb</li>
    <li>extension: <?= esc($uploaded_fileinfo->guessExtension()) ?></li>
</ul>

<p><?= anchor('files', 'Enviar outro arquivo!') ?></p>

</body>
</html>