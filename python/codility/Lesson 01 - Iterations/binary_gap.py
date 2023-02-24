"""
A binary gap within a positive integer N is any maximal sequence of
 consecutive zeros that is surrounded by ones at both ends in the binary
 representation of N.

For example, number 9 has binary representation 1001 and contains a binary gap
 of length 2. The number 529 has binary representation 1000010001 and contains
 two binary gaps: one of length 4 and one of length 3. The number 20 has binary
 representation 10100 and contains one binary gap of length 1.
 The number 15 has binary representation 1111 and has no binary gaps.

Write a function:

def solution(N)

that, given a positive integer N, returns the length of its longest binary gap.
 The function should return 0 if N doesn't contain a binary gap.

For example, given N = 1041 the function should return 5, because N has binary
 representation 10000010001 and so its longest binary gap is of length 5.

Assume that:

N is an integer within the range [1..2,147,483,647].
Complexity:

expected worst-case time complexity is O(log(N));
expected worst-case space complexity is O(1).
"""

def solution(N):
    cnt = 0
    result = 0
    found_one = False

    i = N

    while i:
        if i & 1 == 1:
            if (found_one is False):
                found_one = True
            else:
                result = max(result, cnt)
            cnt = 0
        else:
            cnt += 1
        i >>= 1

    return result

def solution1(n):
    b=bin(n)[2:]
    s1=False
    tz=0 # temp zeros
    mz=0 # max zeros 
    for e in b:
        if e=='1':
            mz=max(tz,mz)
            tz=0
            s1=True
        else:
            if(s1==True):
                tz+=1
            
            
    return mz


def solution2(n):
    b=bin(n)[2:] 
    print(b)
    g=0
    j=-1
    j2=-1
    n=-1
    
    for i in range(len(b)):
        #print(i, b[i])
        
        if b[i]=='1' and j>-1 and n>j:
            j2=i            
            g=max(g,j2-j-1)
        
        if b[i]=='1':
            j=i
            
        if b[i]=='0':
            n=i
            
    return g


def solution3(n):
    # bin representation of N
    b = bin(n)[2:]
    # trim zeros from the right
    b = b.strip("0")
    l = b.split("1")    
    return len(max(l, key=len))


num = 13
print(bin(num), solution3(num))