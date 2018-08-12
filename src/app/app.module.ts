import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';

import { PostListItemComponentComponent } from './post-list-component/post-list-item-component.component';
import {RouterModule, Routes} from '@angular/router';
import {PostsService} from './services/posts.service';
import { HeaderComponent } from './header/header.component';
import { PostFormComponent } from './post-list-component/post-form/post-form.component';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';


const appRoutes: Routes = [
  {path: 'posts', component: PostListItemComponentComponent},
  {path: 'new', component: PostFormComponent},
  {path: '', redirectTo: 'posts', pathMatch: 'full'},
  {path: '**', redirectTo: 'posts'}
];


@NgModule({
  declarations: [
    AppComponent,
    PostListItemComponentComponent,
    HeaderComponent,
    PostFormComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [
    PostsService
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
