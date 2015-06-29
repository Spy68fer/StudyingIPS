<h1>Загрузка файла</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="filename" accept="image/jpeg,image/png,image/gif"/>
  <input type="submit" name="fileUpload" value="Загрузить" />
</form>

<h2>Галерея</h2>
<ul>
  {foreach from=$images item=imageSrc}
    <li><img src={$imageSrc} /></li>
  {/foreach}
</ul>
