#include<stdio.h>
void main()
{
    float a,b,c,x;

    printf("==Menghitung Rumus X==\n");
    printf("Masukkan nilai a : ");
    scanf("%d", &a);
    printf("Masukkan nilai b : ");
    scanf("%d", &b);
    printf("Masukkan nilai c : ");
    scanf("%d", &c);

    x = (-b+2*c*c+4*a*b)/(2*c);
    printf("Nilai X : %d,%d,%d,%d,%d,%d)/(%d,%d)=%d\n",a,b,c,x);
    printf("==========================");
}
