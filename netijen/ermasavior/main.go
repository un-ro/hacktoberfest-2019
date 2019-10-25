package main

import (
	"fmt"
)

func readInt() int {
	var num int
	fmt.Scan(&num)
	return num
}

func readNumbers(count int) []int {
	numbers := []int{}
	idx := 1
loop:
	if idx <= count {
		num := readInt()
		numbers = append(numbers, num)
		idx++
		goto loop
	}
	return numbers
}

func readSeqOfNumbers(N int) [][]int {
	seqOfNumbers := [][]int{}
	idx := 1
loop:
	if idx <= N {
		count := readInt()
		nums := readNumbers(count)
		seqOfNumbers = append(seqOfNumbers, nums)
		idx++
		goto loop
	}
	return seqOfNumbers
}

func getSumOfSeq(seqOfNumbers [][]int) []int {
	results := []int{}
	idx := 0
loop:
	if idx < len(seqOfNumbers) {
		res := calculateSumOfSquares(seqOfNumbers[idx])
		results = append(results, res)
		idx++
		goto loop
	}
	return results
}

func calculateSumOfSquares(numbers []int) int {
	sum := 0
	idx := 0
loop:
	if idx < len(numbers) {
		num := numbers[idx]
		if num >= 0 {
			sum += pow2Int(num)
		}
		idx++
		goto loop
	}
	return sum
}

func pow2Int(x int) int {
	return x * x
}

func printResults(results []int) {
	idx := 0
loop:
	if idx < len(results) {
		fmt.Println(results[idx])
		idx++
		goto loop
	}
}

func main() {
	//input N will be an integer (1 <= N <= 100)
	N := readInt()
	seqOfNumbers := readSeqOfNumbers(N)
	results := getSumOfSeq(seqOfNumbers)
	printResults(results)
}
