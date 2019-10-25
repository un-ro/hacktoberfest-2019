#include <stdio.h>

int main()
{
    int i,a,b;

    printf("masukan bilangan : ");
    scanf("%d",&i);

    for(a=1;a<=i;a++)
    {
    	for(b=1;b<=a;b++)
    	{
    		printf("%d ",b);
    	}
    	printf("\n");
    }
}
