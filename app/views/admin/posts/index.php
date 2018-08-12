<h1>Administer les articles</h1>

<p>
    <a href="?p=categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">

    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>

    <? foreach ( $posts as $post): ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= $post->titre ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id ?>">Editer</a>

                <form action="?p=admin.posts.delete" method="post" style="display:inline-block">
                    <input type="hidden" name="id" value="<?= $post->id ?>"/>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </td>
        </tr>
    <? endforeach ?>

    </tbody>

</table>

<a class="btn btn-primary" href="?p=admin.categories.index">Modifier les catégories</a>