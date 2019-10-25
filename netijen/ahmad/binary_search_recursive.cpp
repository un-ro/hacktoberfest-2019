#include<bits/stdc++.h>
using namespace std;

int binarySearch(int arr[], int l,int r,int x)
{
    if(l <= r)
    {
        int mid = l + (r - l)/2;

        if(arr[mid] == x)
            return mid;
        if(arr[mid] > x)
            return binarySearch(arr,l,mid - 1,x);
        return binarySearch(arr,mid+1,r,x);
    }
    return -1;
}

int main()
{
    int arr[7] = {2,3,6,8,9,10,12};
    int len = sizeof(arr)/sizeof(arr[0]);
    int x = 9;

    int result = binarySearch(arr,0,len-1,x);
    if(result != -1)
        cout<<"Element present at: "<<result;
    else
        cout<<"Element not present in array";

    return 0;
}
