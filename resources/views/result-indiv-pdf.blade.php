<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="Content-Style-Type" content="text/css" />
      <meta name="generator" content="Aspose.Words for .NET 23.7.0" />
      <title></title>
      <style type="text/css">body { line-height:108%; font-family:Calibri; font-size:11pt }p { margin:0pt 0pt 8pt }table { margin-top:0pt; margin-bottom:8pt }.TableGrid {  }</style>
   </head>
   <body>
      <div>
         <p style="text-align:center; line-height:108%; font-size:16pt"><span style="font-weight:bold">Pioneer Academy</span></p>
         <p style="line-height:108%; font-size:16pt"><span style="font-weight:bold; -aw-import:ignore">&#xa0;</span></p>
         <p style="line-height:108%; font-size:12pt"><span style="font-weight:bold">Student Reg:</span><span> {{$result->reg}}</span></p>
         <p style="line-height:108%; font-size:12pt"><span style="font-weight:bold">Student Name: </span><span>{{$result->name}}</span></p>
         <p style="line-height:108%; font-size:12pt"><span style="font-weight:bold">Class: {{$result->class}}</span></p>
         <table cellspacing="0" cellpadding="0" class="TableGrid" style="margin-bottom:0pt; -aw-border-insideh:0.5pt single #000000; -aw-border-insidev:0.5pt single #000000; border-collapse:collapse">
            <tr>
               <td style="width:145pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                  <p style="margin-bottom:0pt; font-size:12pt"><span style="font-weight:bold">#</span></p>
               </td>
               <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                  <p style="margin-bottom:0pt; font-size:12pt"><span style="font-weight:bold">Subject</span></p>
               </td>
               <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                  <p style="margin-bottom:0pt; font-size:12pt"><span style="font-weight:bold">GPA</span></p>
               </td>
            </tr>
            @php
                $i=1;
            @endphp
           
             <tr>
                <td style="width:145pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$i++}}</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>Bangla</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$result->bangla}}</span></p>
                </td>
             </tr>
             <tr>
                <td style="width:145pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$i++}}</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>English</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$result->english}}</span></p>
                </td>
             </tr>
             <tr>
                <td style="width:145pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$i++}}</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>Math</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$result->math}}</span></p>
                </td>
             </tr>
             <tr>
                <td style="width:145pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$i++}}</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>Religion</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$result->religion}}</span></p>
                </td>
             </tr>
             <tr>
                <td style="width:145pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$i++}}</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>Science</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$result->Science}}</span></p>
                </td>
             </tr>
             <tr>
                <td style="width:145pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$i++}}</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>General Knowledge</span></p>
                </td>
                <td style="width:145.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                   <p style="margin-bottom:0pt; font-size:12pt"><span>{{$result->gk}}</span></p>
                </td>
             </tr>
            <tr style="height:5pt">
               <td style="border-top-style:solid; border-top-width:0.75pt; vertical-align:top; -aw-border-top:0.5pt single"></td>
               <td style="border-top-style:solid; border-top-width:0.75pt; vertical-align:top; -aw-border-top:0.5pt single"></td>
               <td style="width:145.05pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-left:0.5pt single; -aw-border-right:0.5pt single">
                  <p style="margin-bottom:0pt; font-size:12pt"><span style="font-weight:bold; -aw-import:spaces">&#xa0;</span><span style="font-weight:bold">Result: {{$result->res}}</span></p>
               </td>
            </tr>
            <tr style="height:0pt">
               <td style="width:155.8pt"></td>
               <td style="width:155.85pt"></td>
               <td style="width:155.85pt"></td>
            </tr>
         </table>
         <p style="line-height:108%; font-size:12pt"><span style="font-weight:bold; -aw-import:ignore">&#xa0;</span></p>
         <p style="line-height:108%; font-size:12pt"><span style="font-weight:bold">Remarks: </span></p>
      </div>
   </body>
</html>