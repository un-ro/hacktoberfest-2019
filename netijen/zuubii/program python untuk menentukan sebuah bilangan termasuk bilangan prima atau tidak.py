# Meminta input bilangan dari pengguna
num = int(input(“Masukkan bilangan: “))

# bilangan prima harus lebih besar dari 1
if num > 1:
for i in range(2,num):
if (num % i) == 0:
print(num, “bukan bilangan prima”)
print(i, “kali”, num//i, “=”, num)
break
else:
print(num,”adalah bilangan prima”)

# bila bilangan kurang atau sama dengan satu
else:
print(num, “bukan bilangan prima”)
