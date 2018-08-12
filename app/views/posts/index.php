
<div class="row">

        <div class="col-sm-8">
            <? foreach($posts as $post): ?>


                <h2> <a href="<?= $post->url ?>"> <?= $post->titre ?> </a>  </h2>

                <p><em><?= $post->categorie ?></em></p>

                <p> <?= $post->extrait ?> </p>


            <? endforeach ?>
        </div>
        <div class="col-sm-4">
            <ul>
                <? foreach($categories as $categorie):  ?>

                    <li> <a href=" <?= $categorie->url ?>"> <?= $categorie->titre ?> </a> </li>

                <? endforeach ?>
            </ul>

        </div>

</div>

