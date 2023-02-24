"""

Task description
Write a function:

def solution(A)

that, given an array A of N integers, returns the smallest positive integer
 (greater than 0) that does not occur in A.

For example, given A = [1, 3, 6, 4, 1, 2], the function should return 5.

For another example, given A = [1, 2, 3], the function should return 4.

Given A = [−1, −3], the function should return 1.

Assume that:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [−1,000,000..1,000,000].
Complexity:

expected worst-case time complexity is O(N);
expected worst-case space complexity is O(N), beyond input storage
 (not counting the storage required for input arguments).
"""

def solution(A):
    n = len(A)
    counter = [0] * n
    for i in range(0, n):
        if (A[i] > 0) and (A[i] <= n):
            counter[A[i] - 1] += 1

    for i in range(0, len(counter)):
        if (counter[i] == 0):
            return i + 1
    return n + 1


def solution1(A):
    A.sort()
    A = list(filter(lambda x: x > 0, A))
    n = len(A)
    if n == 0 or A[0] != 1:
        return 1
    for i in range(n - 1):
        if A[i + 1] - A[i] > 1:
            return A[i] + 1
    return A[n - 1] + 1


def solution2(a):
    a = set(a)
    for i in range(1,1000000+1):
        if i not in a:
            return i
    
    return 