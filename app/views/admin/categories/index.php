<h1>Administer les catégories</h1>

<p>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">

    <thead>
    <tr>
        <td>ID</td>
        <td>Catégorie</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>

    <? foreach ( $items as $category): ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= $category->titre ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id ?>">Editer</a>

                <form action="?p=admin.categories.delete" method="post" style="display:inline-block">
                    <input type="hidden" name="id" value="<?= $category->id ?>"/>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </td>
        </tr>
    <? endforeach ?>

    </tbody>

</table>

<a class="btn btn-primary" href="?p=posts.index">Modifier les articles</a>