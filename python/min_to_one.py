A = [1,2,3,5,8]

for i in range(1, A[-1] + 2):
    if i not in A:
        print(i)
        break
        
print("Done!")
#