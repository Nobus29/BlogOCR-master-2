import {Post} from '../../models/post.model';
import {Injectable} from '@angular/core';
import {Subject} from 'rxjs/Subject';
import * as firebase from 'firebase';
import DataSnapshot = firebase.database.DataSnapshot;


@Injectable()
export class PostsService {

  posts: Post[] = [];
  postsSubject = new Subject<Post[]>();

  constructor() {}

  emitPost() {
    this.postsSubject.next(this.posts);
  }

  savePosts() {
    firebase.database().ref('/posts').set(this.posts);
  }

  getPosts() {
    firebase.database().ref('/posts')
      .on('value', (data: DataSnapshot) =>{
        this.posts = data.val() ? data.val() : [];
        this.emitPost();
      });
  }

  createNewPost(newPost: Post) {
    this.posts.push(newPost);
    this.savePosts();
    this.emitPost();
  }

  removePost(post: Post) {
    const index = this.getIndex(post);
    this.posts.splice(index, 1);
    this.savePosts();
    this.emitPost();
  }

  addLove(index: number) {
    this.posts[index].loveIts++;
    this.savePosts();
    this.emitPost();
  }
  deleteLove(index: number) {
    this.posts[index].loveIts--;
    this.savePosts();
    this.emitPost();
  }

  getIndex(post: Post) {
    return this.posts.findIndex(
      (postEl) => {
        if(postEl == post) {
          return true;
        }
      }
    );
  }

}
