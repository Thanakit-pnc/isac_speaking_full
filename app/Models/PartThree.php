<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartThree extends Model
{
    public static function question($topic) {
        switch($topic) {
            case '1':
                return self::topic1();
                break;
            case '2':
                return self::topic2();
                break;
            case '3':
                return self::topic3();
                break;
            case '4':
                return self::topic4();
                break;
            case '5':
                return self::topic5();
                break;
            case '6':
                return self::topic6();
                break;
            case '7':
                return self::topic7();
                break;
            case '8':
                return self::topic8();
                break;
            case '9':
                return self::topic9();
                break;
            case '10':
                return self::topic10();
                break;
            default:
                return 'Error null';
        }
    }
    
    public static function topic1() {
        return [
            'Is traffic congestion a problem in your town or city?',
            'What time of day is traffic congestion the worst?',
            'What do people generally do when they’re stuck in a traffic jam?',
            'What can the government do to reduce traffic congestion?',
            'What are some of the problems facing people who live in big cities?',
            'Why do people choose to live in large urban areas?',
            'Should the government encourage people to move from big cities to the countryside?',
            'Do you think urban migration, people moving from the countryside to cities, will increase in the future?',
        ];
    }

    public static function topic2() {
        return [
            'Why do we need to have laws?',
            'Do people in your country generally obey the law? Do they follow the rules?',
            'Is it always necessary to obey the law?',
            'Can you think of any occasions when it’s ok to break the law?',
            'Should all people who break the law go to prison?',
            'What other punishments apart from prison might be appropriate?',
            'Should young people below the age of eighteen be put into prisons?',
            'Should countries still use the death penalty for serious crimes?',
        ];
    }

    public static function topic3() {
        return [
            'What can individuals do to reduce the amount of garbage they produce?',
            'How can people reduce the amount of electricity they use in the home?',
            'Why is it important to save water?',
            'What kind of laws should the government make to help protect the environment',
            'What are the causes of climate change?',
            'What problems does global warming cause',
            'In what ways will global warming affect your country?',
            'What can the government and individuals do to try to solve this problem?',
        ];
    }

    public static function topic4() {
        return [
            'Have people’s eating habits changed over the last few years?',
            'Why do you think fast food is so popular in Thailand?',
            'Are there any problems associated with eating too much fast food?',
            'Is fast food likely to remain popular in the future?',
            'What are some of the advantages of eating out rather than eating at home?',
            'Are there any disadvantages of eating out?',
            'What’s the difference between eating out in a café and eating at a restaurant?',
            'What are some of the qualities of a good restaurant?',
        ];
    }

    public static function topic5() {
        return [
            'Is online shopping popular in your country?',
            'What are the benefits of shopping online?',
            'Are there any disadvantages of using the internet to buy things?',
            'Do you think more people will shop online in the future?',
            'Why do people like to follow fashion trends?',
            'Who is more interested in fashion: men or women?',
            'Why do fashion trends change so often?',
            'Are there any negative effects of the fashion industry?',
        ];
    }

    public static function topic6() {
        return [
            'What is the main difference between playing a team sport and playing an individual sport?',
            'What are the benefits for young people to play team games?',
            'Why do some people prefer to play individual sports rather than team sports?',
            'When it comes to watching sports, which are more popular, team sports or individual sports?',
            'Why do you think international sports events are so popular around the world?',
            'What are the benefits of holding international sporting events such as the Olympics?',
            'Some people say that holding large international events such as the Olympics is a waste of money. What do you think?',
            'Do you think international sporting events help improve relationships between countries?',
        ];
    }

    public static function topic7() {
        return [
            'Has technology made working life easier now than in the past?',
            'What sorts of jobs can best be done by robots and automation?',
            'Are there any jobs which robots wouldn’t be suitable for?',
            'Do you think that robots will be used more or less in the future?',
            'Do you think technology makes people lazy?',
            'What are the advantages and disadvantages of technology in general?',
            'Who is affected most by technological innovation: younger people or older people?',
            'What would you say is the best invention ever created?',
        ];
    }

    public static function topic8() {
        return [
            'What can tourists learn by visiting new places?',
            'What can local people do to help tourists enjoy their visit?',
            'Some people believe that there’s no need to travel to a foreign country because you can experience the country through the internet. What do you think?',
            'What are the economic benefits of tourism for a country?',
            'Why do people like to visit historical sites and museums?',
            'Taking care of old buildings and historical sites is expensive. Who should pay for this?',
            'Should entry to these places of interest be free of charge for everyone?',
            'What can schools do to make younger people more aware of their national heritage?',
        ];
    }

    public static function topic9() {
        return [
            'What kinds of job do young people in your country most want to do?',
            'Are there any jobs which young people do NOT want to do?',
            'Who should give young people advice about which job to do choose?',
            'Are young people more interested in getting a job they enjoy or earning a high salary?',
            'At what age do people in your country generally retire? Stop Working?',
            'Do most people receive a pension from their workplace or from the government?',
            'Should old people be allowed to continue working as long as they want to?',
            'What are some of the problems which might arise if older people continue working after retirement age?',
        ];
    }

    public static function topic10() {
        return [
            'On what occasions do people wear formal clothes in your country?',
            'Is there a difference between the kinds of clothes younger people and older people wear?',
            'Do students have to wear a uniform in your country?',
            'To what extent does the climate, the weather, influence what we wear?',
            'What kinds of jobs require employees to wear a uniform in your country?',
            'Why do some employers want their staff to wear uniforms?',
            'Should employees be able to choose the kind of uniform they wear?',
            'Do you think wearing a uniform for work gives workers a sense of loyalty, or pride?',
        ];
    }

    public static function topic11() {
        return [
            'At what age should children start school?',
            'What kinds of things can children learn before they start school, say from their parents?',
            'How important is playing in order to learn new skills?',
            'What kinds of things can children learn from other children?',
            'How important is it for adults to continue learning new skills after they leave school?',
            'How can adults learn new skills after they have left school?',
            'Is it easier for adults to learn new skills than it is for children?',
            'Is it more important to have practical skills, or academic qualifications?',
        ];
    }
    public static function topic12() {
        return [
            'What’s the difference between famous people in the past and famous people nowadays?',
            'Why do you think some people want to become famous?',
            'Why do some people stay famous for a long time while others do not?',
            'Are there any disadvantages of being a celebrity?',
            'In what ways can famous people have a positive impact on society?',
            'Do you think celebrities should behave in different ways from people who aren’t famous?',
            'Do celebrities sometimes have a negative impact on young people?',
            'Why do you think normal people are so interested in celebrities?',
        ];
    }
    public static function topic13() {
        return [
            'Why do you think some people lead an unhealthy lifestyle?',
            'Which is healthier: living in the city or living in the countryside?',
            'Do you think physical activity is the most important thing for people to stay fit and healthy?',
            'Should healthcare be free for everyone in your country?',
            'What can schools do to educate people about healthy living?',
            'What should the government do to encourage people to live a healthy lifestyle?',
            'To what extent should the individual be responsible for their own health?',
            'How important is it for everyone to get vaccinated against diseases?',
        ];
    }
    
}
