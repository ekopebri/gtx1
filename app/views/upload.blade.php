<html>
<head>
    <style type="text/css" media="all">
        @page {
            size: A4 landscape; /* can use also 'landscape' for orientation */
            margin-top: 3.0in;
            margin-bottom: 1.0in;
            
            @bottom-center {
                content: element(footer);
            }
            
            @top-center {
                content: element(header);
            }
        }
            
        #page-header {
            display: block;
            position: running(header);
        }
        
        #page-footer {
            display: block;
            position: running(footer);
        }
    </style>
</head>

<body>
    <div id="page-header">
        <p>Header text</p>
    </div>
    
    <div id="page-footer">
        <p>Footer text</p>
    </div>

    <div id="page-content">
        <p>Body text</p>
    </div>
</body>
</html>