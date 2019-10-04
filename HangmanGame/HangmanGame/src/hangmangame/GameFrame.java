package hangmangame;

import java.awt.List;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.RandomAccessFile;
import java.util.ArrayList;
import java.util.Random;
import java.util.StringTokenizer;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JOptionPane;

public class GameFrame extends javax.swing.JFrame 
{

    public ArrayList<JButton> buttonList = new ArrayList<JButton>();
    public ArrayList<String> list = new ArrayList<>();
    public ArrayList<JButton> lineList = new ArrayList<JButton>();
    public int tries =0;
    public int goodTries =0;
    public Random r = new Random();
    public String GeneratedWord ="";
    
    public GameFrame() {
        initComponents();  
    }

    private void StartGame() throws IOException 
    {
        jLabel12.setText("");
                jLabel13.setText("");
                jLabel14.setText("");
                jLabel15.setText("");
                jLabel16.setText("");
                jLabel17.setText("");
                jLabel18.setText("");
                 jLabel19.setText("");
                 jLabel20.setText("");
                 jLabel21.setText("");
        goodTries =0;
        FillList(); 
        GenerateWord(); 
        GetButtons();
        SwitchButtons(true); //konstrukotr
        jB_Back1.setEnabled(false);
        MakeALLButtonVisible();
        GetLines(); //konstruktor
        LoadLines(true);
        PlaceGeneratedWord();
        WordSetVisibleFalse(false);

    }
    
    public void PlaceGeneratedWord()
    {
        switch(GeneratedWord.length())
        {
            case 1:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                break;
                 case 2:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                break;
                 case 3:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                break;
                case 4:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                jLabel15.setText(GeneratedWord.charAt(3) +"");
                break;
                case 5:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                jLabel15.setText(GeneratedWord.charAt(3) +"");
                jLabel16.setText(GeneratedWord.charAt(4) +"");
                break;
                case 6:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                jLabel15.setText(GeneratedWord.charAt(3) +"");
                jLabel16.setText(GeneratedWord.charAt(4) +"");
                jLabel17.setText(GeneratedWord.charAt(5) +"");
                break;
                case 7:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                jLabel15.setText(GeneratedWord.charAt(3) +"");
                jLabel16.setText(GeneratedWord.charAt(4) +"");
                jLabel17.setText(GeneratedWord.charAt(5) +"");
                jLabel18.setText(GeneratedWord.charAt(6) +"");
                break;
                case 8:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                jLabel15.setText(GeneratedWord.charAt(3) +"");
                jLabel16.setText(GeneratedWord.charAt(4) +"");
                jLabel17.setText(GeneratedWord.charAt(5) +"");
                jLabel18.setText(GeneratedWord.charAt(6) +"");
                 jLabel19.setText(GeneratedWord.charAt(7) +"");
                break;
                 case 9:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                jLabel15.setText(GeneratedWord.charAt(3) +"");
                jLabel16.setText(GeneratedWord.charAt(4) +"");
                jLabel17.setText(GeneratedWord.charAt(5) +"");
                jLabel18.setText(GeneratedWord.charAt(6) +"");
                 jLabel19.setText(GeneratedWord.charAt(7) +"");
                 jLabel20.setText(GeneratedWord.charAt(8) +"");
                break;
                case 10:
                jLabel12.setText(GeneratedWord.charAt(0) +"");
                jLabel13.setText(GeneratedWord.charAt(1) +"");
                jLabel14.setText(GeneratedWord.charAt(2) +"");
                jLabel15.setText(GeneratedWord.charAt(3) +"");
                jLabel16.setText(GeneratedWord.charAt(4) +"");
                jLabel17.setText(GeneratedWord.charAt(5) +"");
                jLabel18.setText(GeneratedWord.charAt(6) +"");
                 jLabel19.setText(GeneratedWord.charAt(7) +"");
                 jLabel20.setText(GeneratedWord.charAt(8) +"");
                 jLabel21.setText(GeneratedWord.charAt(9) +"");
                break;
        }
    }
    public void GetLines()
    {

         lineList.add(jb1);
          lineList.add(jb2);
           lineList.add(jb3);
            lineList.add(jb4);
             lineList.add(jb5);
              lineList.add(jb6);
               lineList.add(jb7);
                lineList.add(jb8);
                lineList.add(jb9);
                lineList.add(jb10);
                
                for (int i = 0; i < lineList.size(); i++) 
                {
                    lineList.get(i).setVisible(false);
                }
    }
    public void LoadLines(boolean b)
    {
        for (int i = 0; i < GeneratedWord.length(); i++)
        {
            lineList.get(i).setVisible(b);
        }
    }
    public void GenerateWord()
    {
        GeneratedWord = list.get(r.nextInt(list.size()));
        System.out.println(GeneratedWord);
    }
    
    public void WordSetVisibleFalse(boolean b)
    {
        jLabel12.setVisible(b);
        jLabel13.setVisible(b);
        jLabel14.setVisible(b);
        jLabel15.setVisible(b);
        jLabel16.setVisible(b);
        jLabel17.setVisible(b);
        jLabel18.setVisible(b);
        jLabel19.setVisible(b);
        jLabel20.setVisible(b);
        jLabel21.setVisible(b);
    }
    private void FillList() throws FileNotFoundException, IOException
    {
       RandomAccessFile raf = new RandomAccessFile("data.txt","r");
       String sor;
        while ((sor = raf.readLine()) != null) 
        {
            list.add(sor);
        }

        raf.close();
        System.out.println(list);
    }

    public void CheckLetter(String s)
    {
        System.out.println("CheckingLetter : " +s);
         if (GeneratedWord.contains(s)) 
        {
            if (jLabel12.getText().equals(s)) 
            {
                jLabel12.setVisible(true);
                goodTries++;
            }
             if (jLabel13.getText().equals(s)) 
            {
                jLabel13.setVisible(true);
                 goodTries++;
            }
              if (jLabel14.getText().equals(s)) 
            {
                jLabel14.setVisible(true);
                 goodTries++;
            }
               if (jLabel15.getText().equals(s)) 
            {
                jLabel15.setVisible(true);
                 goodTries++;
            }
                if (jLabel16.getText().equals(s)) 
            {
                jLabel16.setVisible(true);
                 goodTries++;
            }
                 if (jLabel17.getText().equals(s)) 
            {
                jLabel17.setVisible(true);
                 goodTries++;
            }
                  if (jLabel18.getText().equals(s)) 
            {
                jLabel18.setVisible(true);
                 goodTries++;
            }
                   if (jLabel19.getText().equals(s)) 
            {
                jLabel19.setVisible(true);
                 goodTries++;
            }
                    if (jLabel20.getText().equals(s)) 
            {
                jLabel20.setVisible(true);
                 goodTries++;
            }
                     if (jLabel21.getText().equals(s)) 
            {
                jLabel21.setVisible(true);
                 goodTries++;
            }
                     
                     if (GeneratedWord.length() == goodTries) 
                     {
                         Winner();
                     }
        }
         else {
             tries++;
             System.out.println("not in");
             DrawHangMan();            
         }  
        
    }
    
    public void DrawHangMan(){
       switch(tries)
       {
           case 1:
               jLabel1.setIcon(new ImageIcon(HangmanGame.i1));
               break;
           case 2:
                jLabel1.setIcon(new ImageIcon(HangmanGame.i2));
                break;
           case 3:
                jLabel1.setIcon(new ImageIcon(HangmanGame.i3));
               break;
               case 4:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i4));
               break;
               case 5:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i5));
               break;
               case 6:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i6));
               break;
               case 7:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i7));
               break;
               case 8:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i8));
               break;
               case 9:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i9));
               break;
               case 10:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i10));
                       
               case 11:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i11));
                   break;
               case 12:
                    jLabel1.setIcon(new ImageIcon(HangmanGame.i12));
                            tries =0;
                        Loser();
               break;
       }
        
    }
    
    public void GetButtons()
    {
        buttonList.add(jB_A);
         buttonList.add(jB_A1);
          buttonList.add(jB_A2);
           buttonList.add(jB_A3);
            buttonList.add(jB_A4);
             buttonList.add(jB_A5);
              buttonList.add(jB_A6);
               buttonList.add(jB_A7);
                buttonList.add(jB_A8);
                 buttonList.add(jB_A9);
                  buttonList.add(jB_A10);
                   buttonList.add(jB_A11);
                    buttonList.add(jB_A12);
                     buttonList.add(jB_A13);
                      buttonList.add(jB_A14);
                       buttonList.add(jB_A15);
                        buttonList.add(jB_A16);
                         buttonList.add(jB_A17);
                          buttonList.add(jB_A18);
                           buttonList.add(jB_A19);
                            buttonList.add(jB_A20);
                             buttonList.add(jB_A21);
                              buttonList.add(jB_A26);
                               buttonList.add(jB_A23);
                                buttonList.add(jB_A24);
                                 buttonList.add(jB_A25);
    }
        
    public void ResetWord()
    {
        jLabel12.setText("");
         jLabel13.setText("");
          jLabel14.setText("");
           jLabel15.setText("");
            jLabel16.setText("");
             jLabel17.setText("");
              jLabel18.setText("");
               jLabel19.setText("");
                jLabel20.setText("");
                jLabel21.setText("");
    }
    
    public void Loser()
    {
        System.out.println("Vesztettünk");
        jB_Back1.setEnabled(true);
         SwitchButtons(false);
         WordSetVisibleFalse(true);
    }
    
    public void Winner()
    {
        System.out.println("Nyertünk");
         jB_Back1.setEnabled(true);
         SwitchButtons(false);
         tries =0;
    }
    
    public void MakeALLButtonVisible()
    {
        for (int i = 0; i < buttonList.size(); i++) {
            buttonList.get(i).setVisible(true);
        }
    }
    
    public void SwitchButtons(boolean b)
    {
        for (int i = 0; i < buttonList.size(); i++) {
            buttonList.get(i).setEnabled(b);
        }
    }
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jTF_Opponent = new javax.swing.JTextField();
        jTF_Opp_Name = new javax.swing.JTextField();
        jTF_ETime = new javax.swing.JTextField();
        jTF_E_Time = new javax.swing.JTextField();
        jTF_Round = new javax.swing.JTextField();
        jTF_Round_type = new javax.swing.JTextField();
        jB_A = new javax.swing.JButton();
        jB_Back = new javax.swing.JButton();
        jB_Back1 = new javax.swing.JButton();
        jB_A1 = new javax.swing.JButton();
        jB_A2 = new javax.swing.JButton();
        jB_A3 = new javax.swing.JButton();
        jB_A4 = new javax.swing.JButton();
        jB_A5 = new javax.swing.JButton();
        jB_A6 = new javax.swing.JButton();
        jB_A7 = new javax.swing.JButton();
        jB_A8 = new javax.swing.JButton();
        jB_A9 = new javax.swing.JButton();
        jB_A10 = new javax.swing.JButton();
        jB_A11 = new javax.swing.JButton();
        jB_A12 = new javax.swing.JButton();
        jB_A13 = new javax.swing.JButton();
        jB_A14 = new javax.swing.JButton();
        jB_A15 = new javax.swing.JButton();
        jB_A16 = new javax.swing.JButton();
        jB_A17 = new javax.swing.JButton();
        jB_A18 = new javax.swing.JButton();
        jB_A19 = new javax.swing.JButton();
        jB_A20 = new javax.swing.JButton();
        jB_A21 = new javax.swing.JButton();
        jB_A23 = new javax.swing.JButton();
        jB_A24 = new javax.swing.JButton();
        jB_A25 = new javax.swing.JButton();
        jB_A26 = new javax.swing.JButton();
        jLabel12 = new javax.swing.JLabel();
        jLabel13 = new javax.swing.JLabel();
        jLabel14 = new javax.swing.JLabel();
        jLabel15 = new javax.swing.JLabel();
        jLabel16 = new javax.swing.JLabel();
        jLabel17 = new javax.swing.JLabel();
        jLabel18 = new javax.swing.JLabel();
        jLabel19 = new javax.swing.JLabel();
        jLabel20 = new javax.swing.JLabel();
        jb9 = new javax.swing.JButton();
        jb1 = new javax.swing.JButton();
        jb2 = new javax.swing.JButton();
        jb3 = new javax.swing.JButton();
        jb4 = new javax.swing.JButton();
        jb5 = new javax.swing.JButton();
        jb6 = new javax.swing.JButton();
        jb7 = new javax.swing.JButton();
        jb8 = new javax.swing.JButton();
        jb10 = new javax.swing.JButton();
        jLabel21 = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBackground(new java.awt.Color(255, 255, 255));
        setPreferredSize(new java.awt.Dimension(1000, 700));
        setResizable(false);
        setSize(new java.awt.Dimension(1500, 700));
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowActivated(java.awt.event.WindowEvent evt) {
                formWindowActivated(evt);
            }
        });
        getContentPane().setLayout(null);

        jTF_Opponent.setText("Opponent Name");
        jTF_Opponent.setAutoscrolls(false);
        getContentPane().add(jTF_Opponent);
        jTF_Opponent.setBounds(776, 40, 184, 28);

        jTF_Opp_Name.setText("CPU");
        getContentPane().add(jTF_Opp_Name);
        jTF_Opp_Name.setBounds(776, 80, 184, 28);

        jTF_ETime.setText("Elapsed time");
        getContentPane().add(jTF_ETime);
        jTF_ETime.setBounds(776, 110, 184, 28);
        getContentPane().add(jTF_E_Time);
        jTF_E_Time.setBounds(776, 140, 184, 28);

        jTF_Round.setText("Round");
        getContentPane().add(jTF_Round);
        jTF_Round.setBounds(776, 180, 184, 28);
        getContentPane().add(jTF_Round_type);
        jTF_Round_type.setBounds(776, 210, 184, 28);

        jB_A.setText("A");
        jB_A.setEnabled(false);
        jB_A.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_AActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A);
        jB_A.setBounds(685, 304, 50, 28);

        jB_Back.setText("Back");
        jB_Back.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_BackMouseClicked(evt);
            }
        });
        jB_Back.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_BackActionPerformed(evt);
            }
        });
        getContentPane().add(jB_Back);
        jB_Back.setBounds(804, 626, 180, 40);

        jB_Back1.setText("Start");
        jB_Back1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_Back1MouseClicked(evt);
            }
        });
        jB_Back1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_Back1ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_Back1);
        jB_Back1.setBounds(776, 258, 180, 40);

        jB_A1.setText("B");
        jB_A1.setEnabled(false);
        jB_A1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A1ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A1);
        jB_A1.setBounds(721, 304, 50, 28);

        jB_A2.setText("C");
        jB_A2.setEnabled(false);
        jB_A2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A2ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A2);
        jB_A2.setBounds(758, 304, 50, 28);

        jB_A3.setText("D");
        jB_A3.setEnabled(false);
        jB_A3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A3ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A3);
        jB_A3.setBounds(795, 304, 50, 28);

        jB_A4.setText("E");
        jB_A4.setEnabled(false);
        jB_A4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A4ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A4);
        jB_A4.setBounds(837, 304, 50, 28);

        jB_A5.setText("F");
        jB_A5.setEnabled(false);
        jB_A5.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A5ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A5);
        jB_A5.setBounds(878, 304, 50, 28);

        jB_A6.setText("G");
        jB_A6.setEnabled(false);
        jB_A6.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A6ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A6);
        jB_A6.setBounds(921, 304, 50, 28);

        jB_A7.setText("H");
        jB_A7.setEnabled(false);
        jB_A7.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A7ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A7);
        jB_A7.setBounds(680, 330, 50, 28);

        jB_A8.setText("I");
        jB_A8.setToolTipText("");
        jB_A8.setEnabled(false);
        jB_A8.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A8ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A8);
        jB_A8.setBounds(720, 330, 40, 28);

        jB_A9.setText("J");
        jB_A9.setEnabled(false);
        jB_A9.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A9ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A9);
        jB_A9.setBounds(760, 330, 40, 28);

        jB_A10.setText("K");
        jB_A10.setEnabled(false);
        jB_A10.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A10ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A10);
        jB_A10.setBounds(790, 330, 50, 28);

        jB_A11.setText("L");
        jB_A11.setEnabled(false);
        jB_A11.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A11ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A11);
        jB_A11.setBounds(840, 330, 50, 28);

        jB_A12.setText("M");
        jB_A12.setEnabled(false);
        jB_A12.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A12ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A12);
        jB_A12.setBounds(890, 330, 50, 28);

        jB_A13.setText("N");
        jB_A13.setEnabled(false);
        jB_A13.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A13ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A13);
        jB_A13.setBounds(940, 330, 50, 28);

        jB_A14.setText("O");
        jB_A14.setToolTipText("");
        jB_A14.setEnabled(false);
        jB_A14.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A14ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A14);
        jB_A14.setBounds(680, 360, 50, 28);

        jB_A15.setText("P");
        jB_A15.setEnabled(false);
        jB_A15.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A15ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A15);
        jB_A15.setBounds(730, 360, 50, 28);

        jB_A16.setText("Q");
        jB_A16.setEnabled(false);
        jB_A16.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A16ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A16);
        jB_A16.setBounds(780, 360, 50, 28);

        jB_A17.setText("R");
        jB_A17.setEnabled(false);
        jB_A17.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A17ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A17);
        jB_A17.setBounds(830, 360, 50, 28);

        jB_A18.setText("T");
        jB_A18.setEnabled(false);
        jB_A18.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A18ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A18);
        jB_A18.setBounds(930, 360, 50, 28);

        jB_A19.setText("S");
        jB_A19.setEnabled(false);
        jB_A19.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A19ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A19);
        jB_A19.setBounds(880, 360, 50, 28);

        jB_A20.setText("U");
        jB_A20.setEnabled(false);
        jB_A20.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A20ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A20);
        jB_A20.setBounds(680, 390, 50, 28);

        jB_A21.setText("W");
        jB_A21.setEnabled(false);
        jB_A21.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A21ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A21);
        jB_A21.setBounds(780, 390, 50, 28);

        jB_A23.setText("X");
        jB_A23.setEnabled(false);
        jB_A23.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A23ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A23);
        jB_A23.setBounds(830, 390, 50, 28);

        jB_A24.setText("Y");
        jB_A24.setEnabled(false);
        jB_A24.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A24ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A24);
        jB_A24.setBounds(880, 390, 50, 28);

        jB_A25.setText("Z");
        jB_A25.setEnabled(false);
        jB_A25.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A25ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A25);
        jB_A25.setBounds(930, 390, 50, 28);

        jB_A26.setText("V");
        jB_A26.setEnabled(false);
        jB_A26.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A26ActionPerformed(evt);
            }
        });
        getContentPane().add(jB_A26);
        jB_A26.setBounds(730, 390, 50, 28);

        jLabel12.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel12.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel12.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel12);
        jLabel12.setBounds(50, 170, 60, 60);

        jLabel13.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel13.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel13.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel13);
        jLabel13.setBounds(100, 230, 60, 60);

        jLabel14.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel14.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel14.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel14);
        jLabel14.setBounds(170, 170, 60, 60);

        jLabel15.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel15.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel15.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel15);
        jLabel15.setBounds(220, 230, 60, 60);

        jLabel16.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel16.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel16.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel16);
        jLabel16.setBounds(280, 170, 60, 60);

        jLabel17.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel17.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel17.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel17);
        jLabel17.setBounds(340, 230, 60, 60);

        jLabel18.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel18.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel18.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel18);
        jLabel18.setBounds(410, 170, 60, 60);

        jLabel19.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel19.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel19.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel19);
        jLabel19.setBounds(460, 230, 60, 60);

        jLabel20.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel20.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel20.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel20);
        jLabel20.setBounds(510, 170, 60, 60);

        jb9.setBackground(new java.awt.Color(0, 0, 0));
        jb9.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb9.setEnabled(false);
        jb9.setOpaque(true);
        getContentPane().add(jb9);
        jb9.setBounds(510, 230, 70, 10);

        jb1.setBackground(new java.awt.Color(0, 0, 0));
        jb1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb1.setEnabled(false);
        jb1.setOpaque(true);
        getContentPane().add(jb1);
        jb1.setBounds(50, 230, 70, 10);

        jb2.setBackground(new java.awt.Color(0, 0, 0));
        jb2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb2.setEnabled(false);
        jb2.setOpaque(true);
        getContentPane().add(jb2);
        jb2.setBounds(100, 290, 70, 10);

        jb3.setBackground(new java.awt.Color(0, 0, 0));
        jb3.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb3.setEnabled(false);
        jb3.setOpaque(true);
        getContentPane().add(jb3);
        jb3.setBounds(170, 230, 70, 10);

        jb4.setBackground(new java.awt.Color(0, 0, 0));
        jb4.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb4.setEnabled(false);
        jb4.setOpaque(true);
        getContentPane().add(jb4);
        jb4.setBounds(220, 290, 70, 10);

        jb5.setBackground(new java.awt.Color(0, 0, 0));
        jb5.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb5.setEnabled(false);
        jb5.setOpaque(true);
        getContentPane().add(jb5);
        jb5.setBounds(280, 230, 70, 10);

        jb6.setBackground(new java.awt.Color(0, 0, 0));
        jb6.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb6.setEnabled(false);
        jb6.setOpaque(true);
        getContentPane().add(jb6);
        jb6.setBounds(340, 290, 70, 10);

        jb7.setBackground(new java.awt.Color(0, 0, 0));
        jb7.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb7.setEnabled(false);
        jb7.setOpaque(true);
        getContentPane().add(jb7);
        jb7.setBounds(400, 230, 70, 10);

        jb8.setBackground(new java.awt.Color(0, 0, 0));
        jb8.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb8.setEnabled(false);
        jb8.setOpaque(true);
        getContentPane().add(jb8);
        jb8.setBounds(450, 290, 70, 10);

        jb10.setBackground(new java.awt.Color(0, 0, 0));
        jb10.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/csik.png"))); // NOI18N
        jb10.setEnabled(false);
        jb10.setOpaque(true);
        getContentPane().add(jb10);
        jb10.setBounds(560, 290, 70, 10);

        jLabel21.setFont(new java.awt.Font("Comic Sans MS", 0, 48)); // NOI18N
        jLabel21.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel21.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        getContentPane().add(jLabel21);
        jLabel21.setBounds(570, 230, 60, 60);

        jLabel1.setBackground(new java.awt.Color(255, 255, 255));
        jLabel1.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel1.setOpaque(true);
        jLabel1.setPreferredSize(new java.awt.Dimension(650, 600));
        getContentPane().add(jLabel1);
        jLabel1.setBounds(10, 150, 650, 730);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jB_BackMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_BackMouseClicked
        int dialogButton = JOptionPane.showConfirmDialog (null, "Are you sure?","WARNING",JOptionPane.YES_NO_OPTION);
        if (dialogButton == JOptionPane.YES_OPTION) {
            HangmanGame.BackToTheMain();
        } else {
            //marad a régi
        }
    }//GEN-LAST:event_jB_BackMouseClicked

    private void jB_BackActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_BackActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jB_BackActionPerformed

    private void jB_Back1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_Back1MouseClicked
        // TODO add your handling code here:
    }//GEN-LAST:event_jB_Back1MouseClicked

    private void jB_Back1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_Back1ActionPerformed
        System.out.println("elindul a program");
        try {
            StartGame();
        } catch (IOException ex) {
            Logger.getLogger(GameFrame.class.getName()).log(Level.SEVERE, null, ex);
            System.out.println("nincs meg a fájl");
        }
        finally{
            jLabel1.setIcon(null);
        }
    }//GEN-LAST:event_jB_Back1ActionPerformed

    private void jB_AActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_AActionPerformed
        CheckLetter("a");
        jB_A.setVisible(false);

    }//GEN-LAST:event_jB_AActionPerformed

    private void jB_A1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A1ActionPerformed
         CheckLetter("b");
        jB_A1.setVisible(false);
    }//GEN-LAST:event_jB_A1ActionPerformed

    private void jB_A6ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A6ActionPerformed
         CheckLetter("g");
        jB_A6.setVisible(false);
    }//GEN-LAST:event_jB_A6ActionPerformed

    private void jB_A2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A2ActionPerformed
         CheckLetter("c");
        jB_A2.setVisible(false);
    }//GEN-LAST:event_jB_A2ActionPerformed

    private void jB_A3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A3ActionPerformed
         CheckLetter("d");
        jB_A3.setVisible(false);
    }//GEN-LAST:event_jB_A3ActionPerformed

    private void jB_A7ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A7ActionPerformed
         CheckLetter("h");
        jB_A7.setVisible(false);
    }//GEN-LAST:event_jB_A7ActionPerformed

    private void jB_A8ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A8ActionPerformed
         CheckLetter("i");
        jB_A8.setVisible(false);
    }//GEN-LAST:event_jB_A8ActionPerformed

    private void jB_A9ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A9ActionPerformed
         CheckLetter("j");
        jB_A9.setVisible(false);
    }//GEN-LAST:event_jB_A9ActionPerformed

    private void jB_A10ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A10ActionPerformed
         CheckLetter("k");
        jB_A10.setVisible(false);
    }//GEN-LAST:event_jB_A10ActionPerformed

    private void jB_A11ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A11ActionPerformed
         CheckLetter("l");
        jB_A11.setVisible(false);
    }//GEN-LAST:event_jB_A11ActionPerformed

    private void jB_A12ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A12ActionPerformed
         CheckLetter("m");
        jB_A12.setVisible(false);
    }//GEN-LAST:event_jB_A12ActionPerformed

    private void jB_A13ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A13ActionPerformed
         CheckLetter("n");
        jB_A13.setVisible(false);
    }//GEN-LAST:event_jB_A13ActionPerformed

    private void jB_A14ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A14ActionPerformed
         CheckLetter("o");
        jB_A14.setVisible(false);
    }//GEN-LAST:event_jB_A14ActionPerformed

    private void jB_A15ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A15ActionPerformed
         CheckLetter("p");
        jB_A15.setVisible(false);
    }//GEN-LAST:event_jB_A15ActionPerformed

    private void jB_A17ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A17ActionPerformed
         CheckLetter("r");
        jB_A17.setVisible(false);
    }//GEN-LAST:event_jB_A17ActionPerformed

    private void jB_A16ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A16ActionPerformed
         CheckLetter("q");
        jB_A16.setVisible(false);
    }//GEN-LAST:event_jB_A16ActionPerformed

    private void jB_A19ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A19ActionPerformed
         CheckLetter("s");
        jB_A19.setVisible(false);
    }//GEN-LAST:event_jB_A19ActionPerformed

    private void jB_A18ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A18ActionPerformed
         CheckLetter("t");
        jB_A18.setVisible(false);
    }//GEN-LAST:event_jB_A18ActionPerformed

    private void jB_A20ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A20ActionPerformed
         CheckLetter("u");
        jB_A20.setVisible(false);
    }//GEN-LAST:event_jB_A20ActionPerformed

    private void jB_A21ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A21ActionPerformed
         CheckLetter("w");
        jB_A21.setVisible(false);
    }//GEN-LAST:event_jB_A21ActionPerformed

    private void jB_A26ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A26ActionPerformed
        CheckLetter("v");
        jB_A26.setVisible(false);
    }//GEN-LAST:event_jB_A26ActionPerformed

    private void jB_A4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A4ActionPerformed
        CheckLetter("e");
        jB_A4.setVisible(false);
    }//GEN-LAST:event_jB_A4ActionPerformed

    private void jB_A5ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A5ActionPerformed
        CheckLetter("f");
        jB_A5.setVisible(false);
    }//GEN-LAST:event_jB_A5ActionPerformed

    private void jB_A24ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A24ActionPerformed
       CheckLetter("y");
        jB_A24.setVisible(false);
    }//GEN-LAST:event_jB_A24ActionPerformed

    private void jB_A25ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A25ActionPerformed
        CheckLetter("z");
        jB_A25.setVisible(false);
    }//GEN-LAST:event_jB_A25ActionPerformed

    private void jB_A23ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A23ActionPerformed
        CheckLetter("x");
        jB_A23.setVisible(false);
    }//GEN-LAST:event_jB_A23ActionPerformed

    private void formWindowActivated(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowActivated
      
    }//GEN-LAST:event_formWindowActivated

    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(GameFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(GameFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(GameFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(GameFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new GameFrame().setVisible(true);
                
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jB_A;
    private javax.swing.JButton jB_A1;
    private javax.swing.JButton jB_A10;
    private javax.swing.JButton jB_A11;
    private javax.swing.JButton jB_A12;
    private javax.swing.JButton jB_A13;
    private javax.swing.JButton jB_A14;
    private javax.swing.JButton jB_A15;
    private javax.swing.JButton jB_A16;
    private javax.swing.JButton jB_A17;
    private javax.swing.JButton jB_A18;
    private javax.swing.JButton jB_A19;
    private javax.swing.JButton jB_A2;
    private javax.swing.JButton jB_A20;
    private javax.swing.JButton jB_A21;
    private javax.swing.JButton jB_A23;
    private javax.swing.JButton jB_A24;
    private javax.swing.JButton jB_A25;
    private javax.swing.JButton jB_A26;
    private javax.swing.JButton jB_A3;
    private javax.swing.JButton jB_A4;
    private javax.swing.JButton jB_A5;
    private javax.swing.JButton jB_A6;
    private javax.swing.JButton jB_A7;
    private javax.swing.JButton jB_A8;
    private javax.swing.JButton jB_A9;
    private javax.swing.JButton jB_Back;
    private javax.swing.JButton jB_Back1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel14;
    private javax.swing.JLabel jLabel15;
    private javax.swing.JLabel jLabel16;
    private javax.swing.JLabel jLabel17;
    private javax.swing.JLabel jLabel18;
    private javax.swing.JLabel jLabel19;
    private javax.swing.JLabel jLabel20;
    private javax.swing.JLabel jLabel21;
    private javax.swing.JTextField jTF_ETime;
    private javax.swing.JTextField jTF_E_Time;
    private javax.swing.JTextField jTF_Opp_Name;
    private javax.swing.JTextField jTF_Opponent;
    private javax.swing.JTextField jTF_Round;
    private javax.swing.JTextField jTF_Round_type;
    private javax.swing.JButton jb1;
    private javax.swing.JButton jb10;
    private javax.swing.JButton jb2;
    private javax.swing.JButton jb3;
    private javax.swing.JButton jb4;
    private javax.swing.JButton jb5;
    private javax.swing.JButton jb6;
    private javax.swing.JButton jb7;
    private javax.swing.JButton jb8;
    private javax.swing.JButton jb9;
    // End of variables declaration//GEN-END:variables
}
