package algo

type Trie struct {
	Root  *TrieNode
	IsEnd bool
}
type TrieNode struct {
	children map[string] *TrieNode
	isEnd    bool
	letter   string
}

func Constructor() Trie {
	return Trie{
		Root:  &TrieNode{
			children: make(map[string] *TrieNode),
			isEnd: true,
		},
	}
}

func (this *Trie) Insert(word string) {
	node := this.Root
	len := len(word)

	for i := 0; i < len; i++ {
		w := string(word[i])
		if _, exists := node.children[w]; !exists {
			node.children[w] = &TrieNode{
				letter: w,
				isEnd:  false,
				children: make(map[string] *TrieNode),
			}
		}
		node = node.children[w]
	}
	node.isEnd = true
}

func (this *Trie) Search(word string) bool {
	node := this.Root
	len := len(word)
	for i := 0; i < len; i++ {
		w := string(word[i])
		if _, exists := node.children[w]; !exists {
			return false
		}
		node=node.children[w]
	}
	return node.isEnd
}

func (this *Trie) StartsWith(prefix string) bool {
	word := prefix
	node := this.Root
	len := len(word)
	for i := 0; i < len; i++ {
		w := string(word[i])
		if _, exists := node.children[w]; !exists {
			return false
		}
		node=node.children[w]
	}
	return true
}

