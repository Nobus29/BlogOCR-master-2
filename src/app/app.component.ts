import { Component } from '@angular/core';
import * as firebase from 'firebase';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {

  constructor() {
    var config = {
    apiKey: "AIzaSyA_FrXzgcDZP_7oX3PIthQ8KEum94UOOp8",
    authDomain: "blog-a8f3c.firebaseapp.com",
    databaseURL: "https://blog-a8f3c.firebaseio.com",
    projectId: 'blog-a8f3c',
    storageBucket: "",
    messagingSenderId: "159740105108"
    };
    firebase.initializeApp(config);
  }
}
