var baez = (function(){

    var stopwords = ['?','.',',','"','+','!','i', 'me', 'my', 'myself', 'we', 'our', 'ours', 'ourselves', 'you', "you're", "you've", "you'll", "you'd", 'your', 'yours', 'yourself', 'yourselves', 'he', 'him', 'his', 'himself', 'she', "she's", 'her', 'hers', 'herself', 'it', "it's", 'its', 'itself', 'they', 'them', 'their', 'theirs', 'themselves', 'what', 'which', 'who', 'whom', 'this', 'that', "that'll", 'these', 'those', 'am', 'is', 'are', 'was', 'were', 'be', 'been', 'being', 'have', 'has', 'had', 'having', 'do', 'does', 'did', 'doing', 'a', 'an', 'the', 'and', 'but', 'if', 'or', 'because', 'as', 'until', 'while', 'of', 'at', 'by', 'for', 'with', 'about', 'against', 'between', 'into', 'through', 'during', 'before', 'after', 'above', 'below', 'to', 'from', 'up', 'down', 'in', 'out', 'on', 'off', 'over', 'under', 'again', 'further', 'then', 'once', 'here', 'there', 'when', 'where', 'why', 'how', 'all', 'any', 'both', 'each', 'few', 'more', 'most', 'other', 'some', 'such', 'no', 'nor', 'not', 'only', 'own', 'same', 'so', 'than', 'too', 'very', 's', 't', 'can', 'will', 'just', 'don', "don't", 'should', "should've", 'now', 'd', 'll', 'm', 'o', 're', 've', 'y', 'ain', 'aren', 'couldn', 'didn', 'doesn', 'hadn', 'hasn', 'haven', 'isn', 'ma', 'mightn', 'mustn', 'needn', 'shan', "shan't", 'wasn', 'weren', 'won', 'wouldn','product','item','phone','mobile','device','goods','stock','qunatity','quality']

    function tokenize(sample){

        var tokens = []

        sample.split(' ').forEach(function(token){
            if (baez.stopwords.indexOf(token) & /^[a-zA-Z0-9]+$/.test(token)){
                tokens.push(token.toLowerCase())
            }
        })

        return tokens
    }

    function probdist(tokens,totals){
        Object.keys(tokens).forEach(function(label){
            for (token in tokens[label]){
                var prob = tokens[label][token]['c'] / totals[label]
                tokens[label][token]['p'] = prob;
            }
        });

        return tokens
    }

    function guess(sample){

        scores = {}
        Object.keys(baez.samples).forEach(function(label){
            scores[label] = 0
            tokenize(sample).forEach(function(token){
                var prob = baez.probdist[label][token] || {'p': 0}
                scores[label] = scores[label] + prob['p']
            })
        })

        return scores
    }

    function train(samples){

        baez.samples = samples

        var tokens = {}
        var totals = {}

        Object.keys(samples).forEach(function(label){
            tokens[label] = {}
            totals[label] = 0
            samples[label].forEach(function(sample){
                tokenize(sample).forEach(function(token){
                    tokens[label][token] = tokens[label][token] || {'c': 0}
                    tokens[label][token]['c'] = tokens[label][token]['c'] + 1
                    totals[label] = totals[label] + 1
                })
            })
        });

        baez.probdist = probdist(tokens,totals)

        return baez.probdist

    }

    return {
        guess : guess,
        train : train,
        stopwords : stopwords,
    }

}())
