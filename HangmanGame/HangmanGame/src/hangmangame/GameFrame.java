package hangmangame;

import java.awt.List;
import java.util.ArrayList;
import java.util.Random;
import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JOptionPane;

public class GameFrame extends javax.swing.JFrame {

    public ArrayList<String> list = new ArrayList<>();
    public int tries =0;
    public Random r = new Random();
    public String GeneratedWord ="";
    public GameFrame() {
        initComponents();  
    }

    private void StartGame()
    {
        FillList();
        GenerateWord();
        //kezdésnek eltűntetjük mindet
        jLabel3.setVisible(false);
        jLabel4.setVisible(false);
        jLabel5.setVisible(false);
        jLabel6.setVisible(false);
        jLabel7.setVisible(false);
        jLabel8.setVisible(false);
        jLabel9.setVisible(false);
        jLabel10.setVisible(false);
        jLabel11.setVisible(false);
        jLabel12.setVisible(false);
        
    }
    public void GenerateWord()
    {
        GeneratedWord = list.get(r.nextInt(list.size()));
        jLabel2.setText(GeneratedWord);
        System.out.println(GeneratedWord);
    }
    
    private void FillList()
    {
        list.add("alma");
         list.add("körte");
          list.add("cseresznye");
    }
    
    public void CheckLetter(String s)
    {
        System.out.println("CheckingLetter : " +s);
         if (GeneratedWord.contains(s)) 
        {
            System.out.println("in");
        }else {
             tries++;
             System.out.println("not in");
             DrawHangMan();
             
         }  
        
    }
    
    public void DrawHangMan(){
       switch(tries)
       {
           case 1:
               System.out.println("megörténik " + tries);
               jLabel3.setVisible(true);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
               break;
           case 2:
                  System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(true);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
                        break;
           case 3:
                  System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(true);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
               break;
               case 4:
                      System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(true);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
               break;
               case 5:
                      System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(true);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
               break;
               case 6:
                      System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(true);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
               break;
               case 7:
                      System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(true);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
               break;
               case 8:
                      System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(true);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(false);
               break;
               case 9:
                      System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(true);
                        jLabel12.setVisible(false);
               break;
               case 10:
                      System.out.println("megörténik " + tries);
               jLabel3.setVisible(false);
                jLabel4.setVisible(false);
                 jLabel5.setVisible(false);
                  jLabel6.setVisible(false);
                   jLabel7.setVisible(false);
                    jLabel8.setVisible(false);
                     jLabel9.setVisible(false);
                      jLabel10.setVisible(false);
                       jLabel11.setVisible(false);
                        jLabel12.setVisible(true);
                        tries =0;
                        Loser();
               break;
       }
        
    }
        
    public void Loser()
    {
        System.out.println("Vesztettünk");
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
        jB_A22 = new javax.swing.JButton();
        jB_A23 = new javax.swing.JButton();
        jB_A24 = new javax.swing.JButton();
        jB_A25 = new javax.swing.JButton();
        jLabel4 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        jLabel8 = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        jLabel10 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        jLabel13 = new javax.swing.JLabel();
        jLabel14 = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBackground(new java.awt.Color(255, 255, 255));
        setPreferredSize(new java.awt.Dimension(1000, 700));
        setResizable(false);
        setSize(new java.awt.Dimension(1500, 700));

        jTF_Opponent.setText("Opponent Name");
        jTF_Opponent.setAutoscrolls(false);

        jTF_ETime.setText("Elapsed time");

        jTF_Round.setText("Round");

        jB_A.setText("A");
        jB_A.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_AActionPerformed(evt);
            }
        });

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

        jB_A1.setText("B");
        jB_A1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A1ActionPerformed(evt);
            }
        });

        jB_A2.setText("C");
        jB_A2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A2ActionPerformed(evt);
            }
        });

        jB_A3.setText("D");
        jB_A3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A3ActionPerformed(evt);
            }
        });

        jB_A4.setText("E");

        jB_A5.setText("F");

        jB_A6.setText("G");
        jB_A6.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A6ActionPerformed(evt);
            }
        });

        jB_A7.setText("H");
        jB_A7.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A7ActionPerformed(evt);
            }
        });

        jB_A8.setText("I");
        jB_A8.setToolTipText("");
        jB_A8.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A8ActionPerformed(evt);
            }
        });

        jB_A9.setText("J");
        jB_A9.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A9ActionPerformed(evt);
            }
        });

        jB_A10.setText("K");
        jB_A10.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A10ActionPerformed(evt);
            }
        });

        jB_A11.setText("L");
        jB_A11.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A11ActionPerformed(evt);
            }
        });

        jB_A12.setText("M");
        jB_A12.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A12ActionPerformed(evt);
            }
        });

        jB_A13.setText("N");
        jB_A13.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A13ActionPerformed(evt);
            }
        });

        jB_A14.setText("O");
        jB_A14.setToolTipText("");
        jB_A14.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A14ActionPerformed(evt);
            }
        });

        jB_A15.setText("P");
        jB_A15.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A15ActionPerformed(evt);
            }
        });

        jB_A16.setText("Q");
        jB_A16.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A16ActionPerformed(evt);
            }
        });

        jB_A17.setText("R");
        jB_A17.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A17ActionPerformed(evt);
            }
        });

        jB_A18.setText("T");
        jB_A18.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A18ActionPerformed(evt);
            }
        });

        jB_A19.setText("S");
        jB_A19.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A19ActionPerformed(evt);
            }
        });

        jB_A20.setText("U");
        jB_A20.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A20ActionPerformed(evt);
            }
        });

        jB_A21.setText("V");
        jB_A21.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A21ActionPerformed(evt);
            }
        });

        jB_A22.setFont(new java.awt.Font("sansserif", 0, 10)); // NOI18N
        jB_A22.setText("W");
        jB_A22.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_A22ActionPerformed(evt);
            }
        });

        jB_A23.setText("X");

        jB_A24.setText("Y");

        jB_A25.setText("Z");

        jLabel4.setBackground(new java.awt.Color(255, 255, 255));
        jLabel4.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/1.png"))); // NOI18N
        jLabel4.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel4.setName("jl1"); // NOI18N
        jLabel4.setOpaque(true);
        jLabel4.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel3.setBackground(new java.awt.Color(255, 255, 255));
        jLabel3.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/2.png"))); // NOI18N
        jLabel3.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel3.setName("jl2"); // NOI18N
        jLabel3.setOpaque(true);
        jLabel3.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel5.setBackground(new java.awt.Color(255, 255, 255));
        jLabel5.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/3.png"))); // NOI18N
        jLabel5.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel5.setName("jl3"); // NOI18N
        jLabel5.setOpaque(true);
        jLabel5.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel6.setBackground(new java.awt.Color(255, 255, 255));
        jLabel6.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/4.png"))); // NOI18N
        jLabel6.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel6.setName("jl4"); // NOI18N
        jLabel6.setOpaque(true);
        jLabel6.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel7.setBackground(new java.awt.Color(255, 255, 255));
        jLabel7.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/5.png"))); // NOI18N
        jLabel7.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel7.setName("jl5"); // NOI18N
        jLabel7.setOpaque(true);
        jLabel7.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel8.setBackground(new java.awt.Color(255, 255, 255));
        jLabel8.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/6.png"))); // NOI18N
        jLabel8.setLabelFor(jLabel8);
        jLabel8.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel8.setName("jl6"); // NOI18N
        jLabel8.setOpaque(true);
        jLabel8.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel9.setBackground(new java.awt.Color(255, 255, 255));
        jLabel9.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/7.png"))); // NOI18N
        jLabel9.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel9.setName("jl7"); // NOI18N
        jLabel9.setOpaque(true);
        jLabel9.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel10.setBackground(new java.awt.Color(255, 255, 255));
        jLabel10.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/8.png"))); // NOI18N
        jLabel10.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel10.setName("jl8"); // NOI18N
        jLabel10.setOpaque(true);
        jLabel10.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel11.setBackground(new java.awt.Color(255, 255, 255));
        jLabel11.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/9.png"))); // NOI18N
        jLabel11.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel11.setName("jl9"); // NOI18N
        jLabel11.setOpaque(true);
        jLabel11.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel12.setBackground(new java.awt.Color(255, 255, 255));
        jLabel12.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/10.png"))); // NOI18N
        jLabel12.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel12.setName("jl10"); // NOI18N
        jLabel12.setOpaque(true);
        jLabel12.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel13.setBackground(new java.awt.Color(255, 255, 255));
        jLabel13.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/11.png"))); // NOI18N
        jLabel13.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel13.setName("jl11"); // NOI18N
        jLabel13.setOpaque(true);
        jLabel13.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel14.setBackground(new java.awt.Color(255, 255, 255));
        jLabel14.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hangmangame/12.png"))); // NOI18N
        jLabel14.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel14.setName("jl12"); // NOI18N
        jLabel14.setOpaque(true);
        jLabel14.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel1.setBackground(new java.awt.Color(255, 255, 255));
        jLabel1.setMaximumSize(new java.awt.Dimension(700, 700));
        jLabel1.setOpaque(true);
        jLabel1.setPreferredSize(new java.awt.Dimension(650, 600));

        jLabel2.setFont(new java.awt.Font("sansserif", 1, 36)); // NOI18N
        jLabel2.setText("jLabel2");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(21, 21, 21)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel13, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel7, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(209, 209, 209)
                                .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 267, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel8, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel12, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel14, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel6, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel10, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel9, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel11, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(28, 28, 28)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(77, 77, 77)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jTF_Opponent, javax.swing.GroupLayout.PREFERRED_SIZE, 184, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jTF_Opp_Name, javax.swing.GroupLayout.PREFERRED_SIZE, 184, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jTF_ETime, javax.swing.GroupLayout.PREFERRED_SIZE, 184, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jTF_E_Time, javax.swing.GroupLayout.PREFERRED_SIZE, 184, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jTF_Round, javax.swing.GroupLayout.PREFERRED_SIZE, 184, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jTF_Round_type, javax.swing.GroupLayout.PREFERRED_SIZE, 184, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jB_Back1, javax.swing.GroupLayout.PREFERRED_SIZE, 180, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(jB_A)
                                .addGap(0, 0, 0)
                                .addComponent(jB_A1)
                                .addGap(0, 0, 0)
                                .addComponent(jB_A2)
                                .addGap(0, 0, 0)
                                .addComponent(jB_A3)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jB_A4)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jB_A5)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jB_A6)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jB_A7))
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(layout.createSequentialGroup()
                                        .addGap(1, 1, 1)
                                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                            .addGroup(layout.createSequentialGroup()
                                                .addComponent(jB_A17)
                                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                                .addComponent(jB_A19)
                                                .addGap(1, 1, 1)
                                                .addComponent(jB_A18))
                                            .addGroup(layout.createSequentialGroup()
                                                .addComponent(jB_A8)
                                                .addGap(0, 0, 0)
                                                .addComponent(jB_A9)
                                                .addGap(1, 1, 1)
                                                .addComponent(jB_A10)
                                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                                .addComponent(jB_A11, javax.swing.GroupLayout.PREFERRED_SIZE, 35, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                        .addGap(1, 1, 1)
                                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                                .addComponent(jB_A20)
                                                .addGap(2, 2, 2)
                                                .addComponent(jB_A22)
                                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                                .addComponent(jB_A21))
                                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                                .addComponent(jB_A12)
                                                .addGap(0, 0, 0)
                                                .addComponent(jB_A13)
                                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                                .addComponent(jB_A14))))
                                    .addGroup(layout.createSequentialGroup()
                                        .addComponent(jB_A24)
                                        .addGap(0, 0, 0)
                                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                            .addComponent(jB_A16)
                                            .addComponent(jB_A25))))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jB_A15)
                                    .addComponent(jB_A23)))))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(804, 804, 804)
                        .addComponent(jB_Back, javax.swing.GroupLayout.PREFERRED_SIZE, 180, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(0, 0, 0))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(26, 26, 26)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel13, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel7, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel8, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel12, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel14, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel6, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel10, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel9, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel11, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(14, 14, 14)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 69, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(jTF_Opponent, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(12, 12, 12)
                                .addComponent(jTF_Opp_Name, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(2, 2, 2)
                                .addComponent(jTF_ETime, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(2, 2, 2)
                                .addComponent(jTF_E_Time, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(12, 12, 12)
                                .addComponent(jTF_Round, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(2, 2, 2)
                                .addComponent(jTF_Round_type, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(20, 20, 20)
                                .addComponent(jB_Back1, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(6, 6, 6)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jB_A)
                                    .addComponent(jB_A1)
                                    .addComponent(jB_A2)
                                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jB_A3)
                                        .addComponent(jB_A4)
                                        .addComponent(jB_A5)
                                        .addComponent(jB_A6)
                                        .addComponent(jB_A7)))
                                .addGap(6, 6, 6)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jB_A8)
                                    .addComponent(jB_A9)
                                    .addComponent(jB_A10)
                                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jB_A12)
                                        .addComponent(jB_A11))
                                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jB_A13)
                                        .addComponent(jB_A14)
                                        .addComponent(jB_A15)))
                                .addGap(6, 6, 6)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jB_A17)
                                        .addComponent(jB_A16))
                                    .addComponent(jB_A19)
                                    .addComponent(jB_A18)
                                    .addComponent(jB_A20)
                                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jB_A21)
                                        .addComponent(jB_A23))
                                    .addGroup(layout.createSequentialGroup()
                                        .addGap(2, 2, 2)
                                        .addComponent(jB_A22)))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jB_A24)
                                    .addComponent(jB_A25))))))
                .addGap(0, 0, 0)
                .addComponent(jB_Back, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

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
        StartGame();
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
         CheckLetter("0");
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

    private void jB_A22ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A22ActionPerformed
         CheckLetter("w");
        jB_A22.setVisible(false);
    }//GEN-LAST:event_jB_A22ActionPerformed

    private void jB_A21ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_A21ActionPerformed
         CheckLetter("v");
        jB_A21.setVisible(false);
    }//GEN-LAST:event_jB_A21ActionPerformed

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
    private javax.swing.JButton jB_A22;
    private javax.swing.JButton jB_A23;
    private javax.swing.JButton jB_A24;
    private javax.swing.JButton jB_A25;
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
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel14;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    public javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JTextField jTF_ETime;
    private javax.swing.JTextField jTF_E_Time;
    private javax.swing.JTextField jTF_Opp_Name;
    private javax.swing.JTextField jTF_Opponent;
    private javax.swing.JTextField jTF_Round;
    private javax.swing.JTextField jTF_Round_type;
    // End of variables declaration//GEN-END:variables
}
