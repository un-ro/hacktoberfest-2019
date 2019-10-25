#include <limits.h>
int
main()
{
    int i;
    long int ii;
    printf("hello\n");
    i = 1234;
    printf ("ini nilai i=1234 : %d \n", i);
    ii = 123456;
    printf ("ini nilai ii=123456 : %10d \n", ii);
    printf ("min dan max integer : %d,%d \n", INT_MIN,INT_MAX);
    printf ("max long integer : %ld,%ld\n", LONG_MAX);
    return 0;
}
