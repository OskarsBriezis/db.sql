<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>

<h1>Create</h1>

<form method="POST">
    <label>Title:
        <input name="title"/>
    </label>
    <label>category id:
        <input name="category-id"/>
    </label>
    <button>Save</button>
</form>
<ul>
    <li>1-sport</li>
    <li>2-music</li>
    <li>3-food</li>
</ul>
<?php require "components/footer.php" ?>