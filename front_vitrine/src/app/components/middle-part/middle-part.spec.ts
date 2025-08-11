import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MiddlePart } from './middle-part';

describe('MiddlePart', () => {
  let component: MiddlePart;
  let fixture: ComponentFixture<MiddlePart>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [MiddlePart]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MiddlePart);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
