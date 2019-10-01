# Mendefinisikan fungsi
def print_faktor(x):
“””Fungsi menerima input bilangan dan mencetak faktornya”””

print(“Faktor dari”, x, “adalah:”)
for i in range(1, x+1):
if x % i == 0:
print(i)

# Input bilangan yang akan dicari faktornya
num = int(input(“Masukkan bilangan: “))

print_faktor(num)
