VERSION 5.00
Begin VB.Form Main 
   BorderStyle     =   3  'Fixed Dialog
   Caption         =   "School Days Settings"
   ClientHeight    =   2055
   ClientLeft      =   45
   ClientTop       =   390
   ClientWidth     =   4560
   Icon            =   "Main.frx":0000
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   2055
   ScaleWidth      =   4560
   StartUpPosition =   2  '屏幕中心
   Begin VB.TextBox Text1 
      Height          =   270
      Left            =   480
      MultiLine       =   -1  'True
      TabIndex        =   7
      Text            =   "Main.frx":16692
      Top             =   360
      Visible         =   0   'False
      Width           =   255
   End
   Begin VB.TextBox Text3 
      Height          =   375
      Left            =   1560
      TabIndex        =   5
      Top             =   840
      Width           =   2775
   End
   Begin VB.CommandButton Command3 
      Caption         =   "播放"
      Height          =   495
      Left            =   3000
      TabIndex        =   4
      Top             =   1320
      Width           =   1335
   End
   Begin VB.TextBox Text2 
      Height          =   375
      Left            =   1560
      TabIndex        =   2
      Text            =   "202.112.118.66"
      Top             =   360
      Width           =   2775
   End
   Begin VB.CommandButton Command2 
      Caption         =   "卸载"
      Height          =   495
      Left            =   1680
      TabIndex        =   1
      Top             =   1320
      Width           =   1335
   End
   Begin VB.CommandButton Command1 
      Caption         =   "安装"
      Height          =   495
      Left            =   240
      TabIndex        =   0
      Top             =   1320
      Width           =   1455
   End
   Begin VB.Label Label2 
      Caption         =   "Hash"
      Height          =   375
      Left            =   480
      TabIndex        =   6
      Top             =   960
      Width           =   975
   End
   Begin VB.Label Label1 
      Caption         =   "校园网服务器"
      Height          =   495
      Left            =   360
      TabIndex        =   3
      Top             =   360
      Width           =   1215
   End
End
Attribute VB_Name = "Main"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Private Const cstBase64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"
Private arrBase64() As String
'作者:同济黄正 引用请注明出处:http://hz932.ys168.com
'00100001 00100001 00100001             --源码
'00001000 00010010 00000100 00100001    --Base64码

Public Function Base64Encode(strSource As String) As String
On Error Resume Next
'适用于中、英文的Base64编码/解码VB6超精简版 作者:同济黄正 引用请注明出处:http://hz932.ys168.com
If UBound(arrBase64) = -1 Then
    arrBase64 = Split(StrConv(cstBase64, vbUnicode), vbNullChar)
End If
Dim arrB() As Byte, bTmp(2)  As Byte, bT As Byte
Dim I As Long, J As Long
arrB = StrConv(strSource, vbFromUnicode)

J = UBound(arrB)
For I = 0 To J Step 3
    Erase bTmp
    bTmp(0) = arrB(I + 0)
    bTmp(1) = arrB(I + 1)
    bTmp(2) = arrB(I + 2)
    
    bT = (bTmp(0) And 252) / 4
    Base64Encode = Base64Encode & arrBase64(bT)
    
    bT = (bTmp(0) And 3) * 16
    bT = bT + bTmp(1) \ 16
    Base64Encode = Base64Encode & arrBase64(bT)
    
    bT = (bTmp(1) And 15) * 4
    bT = bT + bTmp(2) \ 64
    If I + 1 <= J Then
        Base64Encode = Base64Encode & arrBase64(bT)
    Else
        Base64Encode = Base64Encode & "="
    End If
    
    bT = bTmp(2) And 63
    If I + 2 <= J Then
        Base64Encode = Base64Encode & arrBase64(bT)
    Else
        Base64Encode = Base64Encode & "="
    End If
Next
End Function

Public Function Base64Decode(strEncoded As String) As String
'适用于中、英文的Base64编码/解码VB6超精简版 作者:同济黄正 引用请注明出处:http://hz932.ys168.com
On Error Resume Next
Dim arrB() As Byte, bTmp(3)  As Byte, bT, bRet() As Byte
Dim I As Long, J As Long
arrB = StrConv(strEncoded, vbFromUnicode)
J = InStr(strEncoded & "=", "=") - 2
ReDim bRet(J - J \ 4 - 1)
For I = 0 To J Step 4
    Erase bTmp
    bTmp(0) = (InStr(cstBase64, Chr(arrB(I))) - 1) And 63
    bTmp(1) = (InStr(cstBase64, Chr(arrB(I + 1))) - 1) And 63
    bTmp(2) = (InStr(cstBase64, Chr(arrB(I + 2))) - 1) And 63
    bTmp(3) = (InStr(cstBase64, Chr(arrB(I + 3))) - 1) And 63
    
    bT = bTmp(0) * 2 ^ 18 + bTmp(1) * 2 ^ 12 + bTmp(2) * 2 ^ 6 + bTmp(3)
    
    bRet((I \ 4) * 3) = bT \ 65536
    bRet((I \ 4) * 3 + 1) = (bT And 65280) \ 256
    bRet((I \ 4) * 3 + 2) = bT And 255
Next
Base64Decode = StrConv(bRet, vbUnicode)
End Function
Private Sub Command1_Click()
On Error GoTo p
Text1.Text = Replace(Text1.Text, "[-HKEY", "[HKEY")
Open App.Path + "\Install.reg" For Output As #1
Print #1, Text1.Text
Close
Shell ("regedit /s " + """" + App.Path + "\Install.reg" + """")
MsgBox "安装完成"
Kill (App.Path + "\Install.reg")
Exit Sub
p: MsgBox "请用管理员权限运行！"
Kill (App.Path + "\Install.reg")
End Sub
Private Sub Command2_Click()
On Error GoTo p
Text1.Text = Replace(Text1.Text, "[HKEY", "[-HKEY")
Open App.Path + "\Uninstall.reg" For Output As #1
Print #1, Text1.Text
Close
Shell ("regedit /s " + """" + App.Path + "\Uninstall.reg" + """")
MsgBox "卸载完成"
Kill (App.Path + "\Uninstall.reg")
Exit Sub
p: MsgBox "请用管理员权限运行！"
Kill (App.Path + "\Uninstall.reg")
End Sub
Private Sub Command3_Click()
Dim g, e, s
On Error GoTo p
If (Text2.Text <> "") Then
If (Text3.Text <> "") Then
g = Text2.Text
e = Text3.Text
s = "http://" + g + "/xy_path.asp|http://" + g + "/iframeplay.html|" + e + "|http://" + g + "/tongji.html|0"
Open App.Path & "\Server.ini" For Output As #1
    Print #1, Text2.Text
Close #1
Shell ("MediaPlayer.exe " + """" + s + """")
Else
MsgBox "Hash不能空！"
End If
Else
MsgBox "校园网服务器不能空！"
End If
Exit Sub
p: MsgBox "缺失MediaPlayer组件！"
End Sub
Private Sub Form_Load()
On Error GoTo p
Dim c
c = Base64Decode(Replace(Replace(Replace(Command, "sdv://", ""), "/" + """", ""), """", ""))
If c <> "" Then
Shell ("MediaPlayer.exe " + """" + c + """")
End
End If
Text1.Text = Replace(Text1.Text, "XXX", Replace(App.Path + "\" + App.EXEName + ".exe", "\", "\\"))
On Error Resume Next
Dim url
Open App.Path & "\Server.ini" For Input As #1
        Line Input #1, url
        If url <> "" Then
        Text2.Text = url
        End If
    Close #1
Exit Sub
p: MsgBox "缺失MediaPlayer组件！"
End
End Sub
  
