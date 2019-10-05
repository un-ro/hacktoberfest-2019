#include<stdio.h>
#define phi 3.14
#define kubik(X) ((X)*(X)*(X))

void main()
{
    int r;
    float v;

    printf("==Menghitung Volume Bola==\n");
    printf("Masukkan jari-jari bola : ");
    scanf("%d", &r);

    v = 4.0/3.0*phi*kubik(r);
    printf("Volume bola dengan jari-jari %d : %f\n",r,v);
    printf("==========================");
}
