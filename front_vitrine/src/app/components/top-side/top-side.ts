import { Component, OnInit , OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';


@Component({
  selector: 'app-top-side',
  imports: [CommonModule],
  templateUrl: './top-side.html',
  styleUrl: './top-side.css'
})
export class TopSide implements OnInit, OnDestroy {

  currentSlide = 0;
  autoSlideInterval: any;
  autoSlideEnabled = true;
  autoSlideDelay = 4000;


  private touchStartX = 0;
  private touchEndX = 0;


 images: { src: string; alt: string }[] = [];

 constructor(private http: HttpClient) {}
  ngOnInit() {
    this.fetchImages();
    if (this.autoSlideEnabled) {
      this.startAutoSlide();
    }
  }
  fetchImages() {
    this.http.get<string[]>('http://localhost:8000/imagens/carrossel')
      .subscribe({
        next: (data) => {
          this.images = data.map((url, index) => ({
            src: url,
            alt: `Slide ${index + 1}`
          }));
        },
        error: (err) => {
          console.error('Erro', err);
        }
      });
  }

  ngOnDestroy() {
    this.stopAutoSlide();
  }

  goToSlide(index: number) {
    this.currentSlide = index;
    this.resetAutoSlide();
  }

  nextSlide() {
    if (this.currentSlide < this.images.length - 1) {
      this.currentSlide++;
    } else {
      this.currentSlide = 0;
    }
    this.resetAutoSlide();
  }

  previousSlide() {
    if (this.currentSlide > 0) {
      this.currentSlide--;
    } else {
      this.currentSlide = this.images.length - 1;
    }
    this.resetAutoSlide();
  }

  startAutoSlide() {
    this.autoSlideInterval = setInterval(() => {
      this.nextSlide();
    }, this.autoSlideDelay);
  }

  stopAutoSlide() {
    if (this.autoSlideInterval) {
      clearInterval(this.autoSlideInterval);
    }
  }

  resetAutoSlide() {
    if (this.autoSlideEnabled) {
      this.stopAutoSlide();
      this.startAutoSlide();
    }
  }

  onImageError(event: any) {
    console.error('Erro ao carregar imagem:', event.target.src);

    event.target.src = 'assets/placeholder.jpg';
  }


  pauseAutoSlide() {
    this.autoSlideEnabled = false;
    this.stopAutoSlide();
  }

  resumeAutoSlide() {
    this.autoSlideEnabled = true;
    this.startAutoSlide();
  }


  onTouchStart(event: TouchEvent): void {
    this.touchStartX = event.changedTouches[0].screenX;
  }

  onTouchEnd(event: TouchEvent): void {
    this.touchEndX = event.changedTouches[0].screenX;
    this.handleSwipe();
  }

  private handleSwipe(): void {
    const swipeThreshold = 50;
    const diff = this.touchStartX - this.touchEndX;

    if (Math.abs(diff) > swipeThreshold) {
      if (diff > 0) {
        this.nextSlide();
      } else {
        this.previousSlide();
      }
    }
  }
}
