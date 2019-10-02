pilihan=input("masukkan list:")
list_x=[1,2,3,4,5]
if(pilihan == "x"):
    print(list_x[0])
    print(list_x[1])
    print(list_x[2])
    print(list_x[3])
    print(list_x[4])
else:
    print("ERROR")
    print("\n")

pilihan=input("masukkan list:")
list_y=[5,4,3,2,1]
if(pilihan == "y"):
    print(list_y[0])
    print(list_y[1])
    print(list_y[2])
    print(list_y[3])
    print(list_y[4])
else:
    print("ERROR")
    print("\n")

pilihan=input("masukkan list:")
list_A=("list_x"+"list_y")
if(pilihan == "A"):
    print(list_x[0]+list_y[0])
    print(list_x[1]+list_y[1])
    print(list_x[2]+list_y[2])
    print(list_x[3]+list_y[3])
    print(list_x[4]+list_y[4])
else:
    print("ERROR")
