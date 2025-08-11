import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopSide } from './top-side';

describe('TopSide', () => {
  let component: TopSide;
  let fixture: ComponentFixture<TopSide>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TopSide]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopSide);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
