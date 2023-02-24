"""
You are given N counters, initially set to 0, and you have two possible
 operations on them:

increase(X) − counter X is increased by 1,
max counter − all counters are set to the maximum value of any counter.
A non-empty zero-indexed array A of M integers is given. This array represents
 consecutive operations:

if A[K] = X, such that 1 ≤ X ≤ N, then operation K is increase(X),
if A[K] = N + 1 then operation K is max counter.
For example, given integer N = 5 and array A such that:

    A[0] = 3
    A[1] = 4
    A[2] = 4
    A[3] = 6
    A[4] = 1
    A[5] = 4
    A[6] = 4
the values of the counters after each consecutive operation will be:

    (0, 0, 1, 0, 0)
    (0, 0, 1, 1, 0)
    (0, 0, 1, 2, 0)
    (2, 2, 2, 2, 2)
    (3, 2, 2, 2, 2)
    (3, 2, 2, 3, 2)
    (3, 2, 2, 4, 2)
The goal is to calculate the value of every counter after all operations.

Write a function:

def solution(N, A)

that, given an integer N and a non-empty zero-indexed array A consisting of
M integers, returns a sequence of integers representing the values of the
counters.

The sequence should be returned as:

a structure Results (in C), or
a vector of integers (in C++), or
a record Results (in Pascal), or
an array of integers (in any other programming language).
For example, given:

    A[0] = 3
    A[1] = 4
    A[2] = 4
    A[3] = 6
    A[4] = 1
    A[5] = 4
    A[6] = 4
the function should return [3, 2, 2, 4, 2], as explained above.

Assume that:

N and M are integers within the range [1..100,000];
each element of array A is an integer within the range [1..N + 1].
Complexity:

expected worst-case time complexity is O(N+M);
expected worst-case space complexity is O(N), beyond input storage
(not counting the storage required for input arguments).
Elements of input arrays can be modified.
"""


def solution(count, operations):
    n = count + 1
    counters = [0] * n
    ocmax = cmax = 0
    for idx in operations:
        if idx == count + 1:
            ocmax = cmax
        else:
            if counters[idx] < ocmax:
                counters[idx] = ocmax
            counters[idx] += 1
            if counters[idx] > cmax:
                cmax = counters[idx]
    return [max(num, ocmax) for num in counters[1:]]



def solution1(n, a):
    r = [0]*n
    for v in a:
        if (v==n+1):
            m = max(r)
            r = [m]*n
        else:
            r[v-1] = r[v-1]+1
            
    return r



from collections import Counter
def maxrep(a):
    if(len(a)==0):
        return 0
    c = Counter(a)
    return c.most_common(1)[0][1]
    
def solution2(n, a):
    ll=[[]]# split to multiple lists
    b = 0 # index for the next sublist
    for i in range(0,len(a)):
        if (a[i]== n+1): # break
            b=b+1
            ll.append([])
        else:
            ll[b].append(a[i])

    c = [] # list of max repeat counters
    for l in ll:
        c.append(maxrep(l))

    s = sum(c[:-1])
    r = [s]* n
    if (c[-1]==0):
        return r
    else:
        # get index of last (n+1)
        if(n+1 in a):
            lin = len(a) - a[::-1].index(n+1)
        else:
            lin =0
        
        for v in a[lin:]:
            r[v-1] = r[v-1]+1
        return r