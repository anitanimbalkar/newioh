/* Rules for using jqgrid component
		1. Specify column info in json format only, no extra tab or whitespace while declareing columninfo
		2. map columnnames and columninfo details properly, so that if any column name and its value  contains url then add it in format as [displayname {urlencode(actualurl)}]
		3. name of jqgrid without space because its id of jqgrid and label will be disaplyed on jqgrid and can contain whitespaces, if dont want lable then dont add.
		4. We can specify only one tabel or view name currenlty from which data need to be populated
		5. where clause should be added as [columnname,operator,value], if multiple where conditions are specified then add multiple statements in [], here by deault and operator is used but if we want or condition in where clause use (or). No need to write (and) for and operator
		6. if any of column value contyains image then just give image source (src value) in [(image) {url} ] in columnnames field.

		*/