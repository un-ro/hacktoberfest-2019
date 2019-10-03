#include<bits/stdc++.h>
using namespace std;

int binarySearch(int arr[], int l,int r, int x)
{
    while(r >= l)
    {
        int mid = l + (r - l)/2;

        if(arr[mid] == x)
            return mid;
        if(arr[mid] > x)
            r = mid - 1;
        else
            l = mid + 1;
    }
    return -1;
}

int main()
{
    int arr[] = {3,4,5,8,10,34,56};
    int len = sizeof(arr)/sizeof(arr[0]);

    int x = 10;
    int result = binarySearch(arr,0,len-1,x);
    if(result != -1)
        cout<<"Element found at position: "<<result;
    else
        cout<<"Element not found";

    return 0;
}
