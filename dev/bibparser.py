#-*- coding: utf-8 -*-
import bibtexparser
from bibtexparser.bparser import BibTexParser
from bibtexparser.customization import homogeneize_latex_encoding
from bibtexparser.customization import convert_to_unicode
from bibtexparser.bwriter import BibTexWriter
from bibtexparser.bibdatabase import BibDatabase

def prep_list(list, separator = ", "):
	return "[" + ",".join(['"{0}"'.format(x.encode('utf-8')) for x in list.split(separator)]) + "]"

def write_file(bibtex_file):
	list_quoting = ['year', 'ID', 'date', 'link', 'booktitle', 'title', 'editor', 'abstract', 'school', 'institution', 'number', 'type', 'pages', 'volume', 'doi', 'issn', 'isbn', 'publisher', 'address', 'issue']

	for item in list_quoting:
		if item in bib.keys():
			try:
				bibtex_file.write("\n" + item + ": \"" + bib[item].encode('utf-8') + "\"")
			except:
				print bib['ID'] + ": " + item 
		if item == "institution":
			print bib

with open('lis.bib') as bibtex_file:
    parser = BibTexParser()
    #parser.customization = homogeneize_latex_encoding
    parser.customization = convert_to_unicode
    bibtex_database = bibtexparser.load(bibtex_file, parser=parser)

i = 0
for bib in bibtex_database.entries:
	name = bib['date']+'-'+bib['ID']+'.html'
	with open("../_posts/publications/" + name, 'w+') as bibtex_file:
		authors = bib['author'].split(" and ")
		authors = "; ".join(["".join(x.split(" ")[-1]) + ", " + " ".join(x.split(" ")[0:-1]) for x in authors])

		bibtex_file.write("---")
		bibtex_file.write("\ncategories: [\"publications\",\"" + bib['year'] + "\"]")
		bibtex_file.write("\ncode: \"" + bib['ID'] + bib['year'] + "\"")
		bibtex_file.write("\ntype: " + bib['ENTRYTYPE'])
		bibtex_file.write("\nauthors: " + prep_list(authors, "; "))
		if 'keyword' in bib:
			bibtex_file.write("\ntags: " + prep_list(bib['keyword'], "; "))
		write_file(bibtex_file) 		
		bibtex_file.write("\n---")
		bibtex_file.write("\n{% raw %}\n")
		entries = bibtex_database.entries[i]
		for key in entries:
			entries[key] = entries[key].encode('utf-8')

		db = BibDatabase()
		db.entries = [entries]

		try:
			bibtexparser.dump(db, bibtex_file)
		except:
			print bib['ID']
		bibtex_file.write("{% endraw %}")
	i += 1