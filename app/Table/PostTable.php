<?

namespace App\Table;


use Core\Table\Table;


class PostTable extends Table {

    protected $table = 'posts';

    /**
     * Récupère les derniers posts
     * return array
     */
    public function last(){

       return $this->query("
         SELECT posts.id, posts.titre, posts.contenu, posts.date, categories.titre as categorie
         FROM posts
         LEFT JOIN categories ON category_id = categories.id
         ORDER BY posts.date DESC

       ");

    }

    /**
     * Récupère les derniers posts de la catégorie demandée
     * @param $category_id int
     * return array
     */
    public function lastBycategory($category_id){

        return $this->query("
         SELECT posts.id, posts.titre, posts.contenu, posts.date, categories.titre as categorie
         FROM posts
         LEFT JOIN categories ON category_id = categories.id
         WHERE posts.category_id = ?
         ORDER BY posts.date DESC", [$category_id]);


    }

    /**
     * Récupère les un article en liant la catégorie associée
     * @param $id int
     * return \App\Entity\PostEntity
     */


    public function findWithCategory($id){

        return $this->query("
         SELECT posts.id, posts.titre, posts.contenu, posts.date, categories.titre as categorie
         FROM posts
         LEFT JOIN categories ON category_id = categories.id
         WHERE posts.id = ? ", [$id], true);

    }


}