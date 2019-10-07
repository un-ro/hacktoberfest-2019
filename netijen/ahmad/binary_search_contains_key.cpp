#include<bits/stdc++.h>
using namespace std;

bool binary_Search(int arr[], int l, int r, int x)
{
    while(l <= r)
    {
        int mid = l + (r - l)/2;

        if(arr[mid] == x)
            return true;
        if(arr[mid] > x)
            r = mid - 1;
        else
            l = mid + 1;
    }
    return false;
}

int main()
{
    int arr[] = {2,3,5,6,7,10,34};
    int len = sizeof(arr)/sizeof(arr[0]);
    int x = 7;

    bool result = binary_Search(arr,0,len - 1,x);
    if(result)
        cout<<"Present in list"<<endl;
    else
        cout<<"Not present in list"<<endl;
    bool result2 = binary_Search(arr,0,len - 1,9);
    if(result2)
        cout<<"Present"<<endl;
    else
        cout<<"Not present"<<endl;

    return 0;

}
