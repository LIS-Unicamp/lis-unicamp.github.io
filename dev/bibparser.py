#-*- coding: utf-8 -*-
import bibtexparser
from bibtexparser.bparser import BibTexParser
from bibtexparser.customization import homogeneize_latex_encoding
from bibtexparser.customization import convert_to_unicode
from bibtexparser.bwriter import BibTexWriter
from bibtexparser.bibdatabase import BibDatabase

def prep_list(list, separator = ", "):
	return "[" + ",".join(['"{0}"'.format(x) for x in list.split(separator)]) + "]"

def write_file(bibtex_file):
	list_quoting = ['year', 'date', 'link', 'booktitle', 'title', 'editor', 'abstract']

	for item in list_quoting:
		if item in bib.keys():
			try:
				bibtex_file.write("\n" + item + ": \"" + bib[item] + "\"")
			except:
				print bib['ID'] + ": " + item 

with open('lis.bib') as bibtex_file:
    parser = BibTexParser()
    parser.customization = homogeneize_latex_encoding
    #parser.customization = convert_to_unicode
    bibtex_database = bibtexparser.load(bibtex_file, parser=parser)

i = 0
for bib in bibtex_database.entries:
	name = bib['date']+'-'+bib['ID']+'.html'
	with open("../_posts/publications/" + name, 'w+') as bibtex_file:
		authors = bib['author'].split(" and ")
		authors = "; ".join(["".join(x.split(" ")[-1]) + ", " + " ".join(x.split(" ")[0:-1]) for x in authors])

		bibtex_file.write("---")
		bibtex_file.write("\ncategory: publications")
		bibtex_file.write("\ntype: " + bib['ENTRYTYPE'])
		bibtex_file.write("\nauthors: " + prep_list(authors, "; "))
		bibtex_file.write("\ntags: " + prep_list(bib['keyword']))
		write_file(bibtex_file) 		
		bibtex_file.write("\n---")
		bibtex_file.write("\n{% raw %}\n")
		db = BibDatabase()
		db.entries = [bibtex_database.entries[i]]
		try:
			bibtexparser.dump(db, bibtex_file)
		except:
			print bib['ID']
		bibtex_file.write("{% endraw %}")
	i += 1