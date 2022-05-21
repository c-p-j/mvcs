<?php require_once 'view/vwheader.php'; ?>

<h1>Home page</h1>
<form action='index.php?controller=ctrllanguage&action=viewlanguageall' method='POST'>
    <input type='submit' value='elenco lingue'>
</form>
<hr>
<form action='index.php?controller=ctrllanguage&action=viewlanguage' method='POST'>
    codice = <input type='input' name='where' value='1'>
    <input type='submit' value='select lingua'>
</form>
<hr>
<form action='index.php?controller=ctrllanguage&action=viewlanguage' method='POST'>
    <label for="order">Ordinato su</label>
    <select id="order" name="order">
        <option value="codice">codice</option>
        <option value="descrizione">descrizione</option>
    </select> <input type='submit' value='elenco lingue ordinate'>
</form>
<hr>
<form action='index.php?controller=ctrllanguage&action=insertlanguage' method='POST'>
    <label for="codice">Codice </label>
    <input type='input' name='codice' value=''>
    <label for="descrizione">Descrizione </label>
    <input type='input' name='descrizione' value=''>
    <input type='submit' value='Salva lingua'>
</form>

<?php require_once 'view/vwfooter.php'; ?>