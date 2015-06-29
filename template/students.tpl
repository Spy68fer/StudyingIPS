<h1>Students</h1>
<ul>
  {foreach from=$students item=student}
    <li>{$student.name|escape:html}, {$student.age}</li>
  {/foreach}
</ul>