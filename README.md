# New-Icelandic-words
Using a corpus of common words, this creates a state machine and traverses it to make new icelandic words.

This is a simple PHP script which reads in the list of words and starts to generate new words which probablistically would make sense.

php is-state-machine.php

This will generate a new random word.

## Todo
The results are not that interesting. Rather than look at single characters, it is possible to take 2 or 3 character sets.

## See Also
The word corpus comes from https://en.wiktionary.org/wiki/Wiktionary:Frequency_lists/Icelandic_wordlist which has some obvious errors. If a better list is found, it is easy to switch.
