def simple(n):
    F1 = 1
    F2 = 1
    while F2 <= n:
        F1, F2 = F2, F1+F2
        return F2
n_values = [75, 50, 100]
results = {n: simple(n) for n in n_values}
print(results)

