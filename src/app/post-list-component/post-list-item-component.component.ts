import {Component, OnDestroy, OnInit} from '@angular/core';
import {Post} from '../../models/post.model';
import {PostsService} from '../services/posts.service';
import {Router} from '@angular/router';
import {Subscription} from '../../../node_modules/rxjs';

@Component({
  selector: 'app-post-list-item-component',
  templateUrl: './post-list-item-component.component.html',
  styleUrls: ['./post-list-item-component.component.scss']
})

export class PostListItemComponentComponent implements OnInit, OnDestroy {

  posts: Post[];
  postsSubscription: Subscription;


  constructor(private postsService: PostsService, private router: Router) { }

  ngOnInit() {
    this.postsSubscription = this.postsService.postsSubject.subscribe(
      (posts: Post[]) => {
        this.posts = posts;
      }
    );
    this.postsService.getPosts();
    this.postsService.emitPost();
  }

  ngOnDestroy(): void {
    this.postsSubscription.unsubscribe();
  }

  addLove(index: number) {
    this.postsService.addLove(index);
  }

  deleteLove(index: number) {
    this.postsService.deleteLove(index);
  }

  deletePost(post: Post) {
    this.postsService.removePost(post);
  }

}
