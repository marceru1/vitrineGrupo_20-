import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { TopSide } from './components/top-side/top-side';
import { MiddlePart } from "./components/middle-part/middle-part";
import { DownSide } from './components/down-side/down-side';
import { Footer } from './components/footer/footer';
import { HttpClientModule } from '@angular/common/http';

import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
@Component({
  standalone: true,
  selector: 'app-root',
  imports: [FontAwesomeModule,RouterOutlet, TopSide, MiddlePart, DownSide, Footer, HttpClientModule],
  templateUrl: './app.html',
  styleUrls: ['./app.css']
})
export class App {
  protected title = 'lojas001';
}
