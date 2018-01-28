import bibtexparser
from bibtexparser.bparser import BibTexParser
from bibtexparser.customization import homogeneize_latex_encoding
from bibtexparser.bwriter import BibTexWriter
from bibtexparser.bibdatabase import BibDatabase

def prep_list(list):
	return "[" + ",".join(['"{0}"'.format(x) for x in list.split(", ")]) + "]"

with open('lis.bib') as bibtex_file:
    parser = BibTexParser()
    parser.customization = homogeneize_latex_encoding
    bibtex_database = bibtexparser.load(bibtex_file, parser=parser)

writer = BibTexWriter()
writer.indent = '    '

for bib in bibtex_database.entries:
	print (bib.keys())
	name = bib['date']+'-'+bib['ID']+'.html'
	with open("_posts/publications/" + name, 'w+') as bibtex_file:
		authors = bib['author'].split(" and ")
		print authors
		print authors[-1]
		authors = "; ".join(["".join(x.split(" ")[-1]) + ", " + " ".join(x.split(" ")[0:-1]) for x in authors])

		bibtex_file.write("---")
		bibtex_file.write("\ncategory: publications")
		bibtex_file.write("\nyear: " + bib['year'])
		bibtex_file.write("\ndate: " + bib['date'])
		bibtex_file.write("\ntitle: \"" + bib['title'] + "\"")
		bibtex_file.write("\nlink: " + bib['link'])
		bibtex_file.write("\ntype: " + bib['ENTRYTYPE'])
		bibtex_file.write("\nauthors: " + prep_list(authors))
		bibtex_file.write("\nbooktitle: \"" + bib['booktitle'] + "\"")
		bibtex_file.write("\ntags: " + prep_list(bib['keyword'])) 
		bibtex_file.write("\nabstract: \"" + bib['abstract'] + "\"")
		bibtex_file.write("\n---")
		bibtex_file.write("\n{% raw %}\n")
		bibtexparser.dump(bibtex_database, bibtex_file)
		bibtex_file.write("{% endraw %}")
	exit()

