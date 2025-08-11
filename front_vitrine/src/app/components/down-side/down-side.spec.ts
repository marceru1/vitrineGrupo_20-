import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DownSide } from './down-side';

describe('DownSide', () => {
  let component: DownSide;
  let fixture: ComponentFixture<DownSide>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [DownSide]
    })
    .compileComponents();

    fixture = TestBed.createComponent(DownSide);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
