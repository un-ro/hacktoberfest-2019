#include<bits/stdc++.h>
using namespace std;

int firstOccurence(int arr[], int low, int high, int key, int n)
{
    if(high >= low)
    {
        int mid = low + (high - low)/2;

        if((mid == 0|| key > arr[mid-1]) && arr[mid] == key)
            return mid;
        else if(key > arr[mid])
            return firstOccurence(arr,mid + 1,high,key,n);
        else
            return firstOccurence(arr,low,mid - 1,key,n);
    }
    return -1 ;
}

int lastOccurence(int arr[], int low, int high, int key,int n)
{
    if(high >= low)
    {
        int mid = low + (high - low)/2;

        if((mid == n - 1 || arr[mid + 1] > key) && arr[mid] == key)
            return mid;
        else if(key < arr[mid])
            return lastOccurence(arr,low,mid - 1,key,n);
        else
            return lastOccurence(arr,mid + 1,high,key,n);
    }
    return -1;
}


int main()
{
    int arr[] = {1,2,2,2,3,3,4,5,6,6,7};
    int len = sizeof(arr)/sizeof(arr[0]);

    int x = 2;

    int first_occurence = firstOccurence(arr,0,len-1,x,len);
    int last_occurence = lastOccurence(arr,0,len-1,x,len);

    cout<<"First occurence of x is: "<<first_occurence<<endl;
    cout<<"Last occurence of x is: "<<last_occurence<<endl;

    return 0;
}
