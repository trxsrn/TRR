<?php 

include 'connection.php';
include 'navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap"
rel="stylesheet"/>
    
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="fontawesome-library/css/all.css"/>
    
    <!-- JQUERY JS CONNECTION -->
    <script src="query-3.6.3.min.js"></script>
    <!-- CSS STYLE -->
    <link rel="stylesheet" href="css/navigation.css" />
    <link rel="stylesheet" href="css/reviewer_form.css" />
  </head>
  <body>
  <section id="content">
    <div class="content-body">
        <h3><a href="MyTask.php">MY TASK</a> ><a href="research_overview.php">OVERVIEW</a> > RESEARCH TITLE</h3>
        <h1>RESEARCH TITLE </h1>
        <h4>Discipline </h4>
        <h4>Authors </h4>
        <table>
            <tr>
                <td class="rsrch-lbl">PAPER ID:</td>
                <td class="rsrch-desc">PTC-22-01-1</td>
            <tr>
            <tr>
                <td class="rsrch-lbl">Study Title</td>
                <td class="rsrch-desc">PTC-22-01-1</td>
            <tr>
            <tr>
                <td class="rsrch-lbl">Reviewer ID No.</td>
                <td class="rsrch-desc">RDC-S-24-02</td>
            <tr>
            <tr>
                <td class="rsrch-lbl">Date of Review</td>
                <td class="rsrch-desc">January 1, 2023</td>
            <tr>
        </table>
        <table>
            <!-- General -->
            <tr>
                <th class="part">General:</th>
                <th class="answer">Yes</th>
                <th class="answer">No</th>
            </tr>
            <tr>
                <td>1. The style of writing is appropriate to the nature of study which
                    has lessened wordiness but uses words that are generally easy to interpret by majority of readers.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>2. The study contributes new perspectives in the covered study area which helps in further strengthening of existing theory and/or establishing new theory in the discipline.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>3. The study has a thorough theoretical foundation.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>Additional Comment</th>
            </tr>
            <tr>
                <td colspan="3"><textarea></textarea><td>
            </tr>
            <!-- Presentation -->
            <tr>
                <th class="part">Presentation:</th>
                <th class="answer">Yes</th>
                <th class="answer">No</th>
            </tr>
            <tr>
                <td>4. The study addresses and/or opens up to global concerns
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>5. The study has observable local perspective of the topics/problem.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>6. The title sums up the most significant result of the study and encompasses the content of the study.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>Additional Comment</th>
            </tr>
            <tr>
                <td colspan="3"><textarea></textarea><td>
            </tr>
            <!-- Abstract -->
            <tr>
                <th class="part">Abstract:</th>
                <th class="answer">Yes</th>
                <th class="answer">No</th>
            </tr>
            <tr>
                <td>7. The abstract is well-synthesized.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>Additional Comment</th>
            </tr>
            <tr>
                <td colspan="3"><textarea></textarea><td>
            </tr>
            <!-- Introduction -->
            <tr>
                <th class="part">Introduction:</th>
                <th class="answer">Yes</th>
                <th class="answer">No</th>
            </tr>
            <tr>
                <td>8. There is a clear and appropriate introduction to the paper’s content.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>9. The literature serves as a comprehensive support to the study and is relevant.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>10. A gap has been presented to justify the need for conducting the study.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>Additional Comment</th>
            </tr>
            <tr>
                <td colspan="3"><textarea></textarea><td>
            </tr>
            <!-- Methodology -->
            <tr>
                <th class="part">Methodology:</th>
                <th class="answer">Yes</th>
                <th class="answer">No</th>
            </tr>
            <tr>
                <td>11. The study design is aligned with its objectives and scope.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>12. The questions in the study are answered by fitting sample of the population.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>13. The selection method of the sample/cases is clearly identified.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>Additional Comment</th>
            </tr>
            <tr>
                <td colspan="3"><textarea></textarea><td>
            </tr>
            <!-- Results and Discussion -->
             <tr>
                <th class="part">Results and Discussion:</th>
                <th class="answer">Yes</th>
                <th class="answer">No</th>
            </tr>
            <tr>
                <td>14. The descriptive and/or statistical results are organized and free of insignificant data. These results include tables, figures, graphs, and others that are relevant.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>15. The discussion clearly describes the results of the study and there is no repetition of data.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>16. The discussion of results is interpreted logically and does not set an uncertain tone to the readers.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>17. The results are interpreted correctly and shows alignment with the literature.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>18. There is a substantial amount of citations that show variation in results to support and introduce gaps.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>Additional Comment</th>
            </tr>
            <tr>
                <td colspan="3"><textarea></textarea><td>
            </tr>
            <!-- Literature Cited -->
            <tr>
                <th class="part">Literature Cited:</th>
                <th class="answer">Yes</th>
                <th class="answer">No</th>
            </tr>
            <tr>
                <td>19. The references are high standard, reliable, rooted from traceable and reputable and indexed databases.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>20. The study has been justified and includes answered research questions.
                </td>
                <td><input type="radio"></td>
                <td><input type="radio"></td>
            </tr>
            <tr>
                <td>Additional Comment</th>
            </tr>
            <tr>
                <td colspan="3"><textarea></textarea><td>
            </tr>
        </table>
        <table>
                <tr>
                    <th>Evaluation Criteria</th>
                    <th>Value<th>
                </tr>
                <tr>
                    <td>Accept without Revision</td>
                    <td>19-20</td>
                </tr>
                <tr>
                    <td>Accept with Revision</td>
                    <td>10-18</td>
                </tr>
                <tr>
                    <td>REJECT, not fit for publication at this time</td>
                    <td>1-9</td>
                </tr>
                


        </table>
        <a href="reviewer_form.php" class="review_btn">Review &nbsp &nbsp <i class="fa-solid fa-chevron-right"></i></a>
    </div>
</section>
</div> 
    <script src="nav_control.js"></script>
  </body>
</html>
